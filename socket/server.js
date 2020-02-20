const io = require('socket.io')();
var SerialPort = require('serialport');
var xbee_api = require('xbee-api');
var C = xbee_api.constants;
const axios = require('axios');

var xbeeAPI = new xbee_api.XBeeAPI({
  api_mode: 2
});

process.env.NODE_TLS_REJECT_UNAUTHORIZED = "0";


let serialport = new SerialPort("/dev/tty.SLAB_USBtoUART", {
  baudRate: 9600,
}, (err) => {
  if (err) {
    return console.log('Error: ', err.message)
  }
});

serialport.pipe(xbeeAPI.parser);
xbeeAPI.builder.pipe(serialport);

serialport.on("open", () => {
  var frame_obj = { // AT Request to be sent
    type: C.FRAME_TYPE.AT_COMMAND,
    command: "NI",
    commandParameter: [],
  };

  xbeeAPI.builder.write(frame_obj);

  frame_obj = { // AT Request to be sent
    type: C.FRAME_TYPE.REMOTE_AT_COMMAND_REQUEST,
    destination64: "FFFFFFFFFFFFFFFF",
    command: "NI",
    commandParameter: [],
  };
  xbeeAPI.builder.write(frame_obj);

});

// All frames parsed by the XBee will be emitted here

xbeeAPI.parser.on("data", (frame) => {

  //on new device is joined, register it

  //on packet received, dispatch event
  //let dataReceived = String.fromCharCode.apply(null, frame.data);
  if (C.FRAME_TYPE.ZIGBEE_RECEIVE_PACKET === frame.type) {
    console.log("C.FRAME_TYPE.ZIGBEE_RECEIVE_PACKET");
    let dataReceived = String.fromCharCode.apply(null, frame.data);
    console.log(">> ZIGBEE_RECEIVE_PACKET >", dataReceived);

    browserClient && browserClient.emit('pad-event', {
      device: frame.remote64,
      data: dataReceived
    });
  }

  if (C.FRAME_TYPE.NODE_IDENTIFICATION === frame.type) {
    // let dataReceived = String.fromCharCode.apply(null, frame.nodeIdentifier);
    // console.log(">> ZIGBEE_RECEIVE_PACKET >", frame);


  } else if (C.FRAME_TYPE.ZIGBEE_IO_DATA_SAMPLE_RX === frame.type) {
    console.debug(frame);
    let dataReceived = String.fromCharCode.apply(null, frame.commandData)

    // listGreetings();


    // console.log(dataReceived);
    // for (object in frame) {
    //   console.log(frame[object]);
    // }


  } else if (C.FRAME_TYPE.REMOTE_COMMAND_RESPONSE === frame.type) {

  } else {
    // console.debug(frame);
    // let dataReceived = String.fromCharCode.apply(null, frame.commandData)
    // console.log(dataReceived);
  }

});
let browserClient;
io.on('connection', (client) => {
  console.log(client.client.id);
  browserClient = client;

  client.on('subscribeToPad', (interval) => {
    console.log('client is subscribing to timer with interval ', interval);
    // setInterval(() => {
    //   client.emit('pad-event', {
    //     device: "test device",
    //     data: Math.round(Math.random()) * 2 - 1
    //   })
    //   ;
    // }, Math.random() * 1000);
  });

  client.on("disconnect", () => {
    console.log("Client disconnected");
  });
});

const port = 8000;
io.listen(port);
console.log('listening on port ', port);
let equipements;
const getEquipments = async () => {
  try {
    const res = await axios.get('https://localhost:8443/equipments', {
      headers: {
        'Content-Type': 'application/ld+json'
      },
      params: {
        page: 1
      }
    });
    console.log(res.data);
    equipements = res.data;
    return equipements;
  } catch (err) {
    console.error(err);
  }
};

const postEquipment = async (data) => {
  try {
    const res = await axios.post('https://localhost:8443/equipments', {
      headers: {
        'Content-Type': 'application/ld+json'
      },
      params: {
        macAddress: data.macAdress,
        name: data.name,
        type: data.name,
      }
    });
    return res.data;
  } catch (err) {
    console.error(err);
  }
}

const checkIfEquipmentExist = async (data) => {
  let exist = false
  await getEquipments();

  // for loop to check if data.macAdress match with one of the macAdresses received then set exist variable to true or false
  if (!exist) {
    postEquipment();
    return true;
  } else {
    return false;
  }
}

const postTemperature = async (data, equipment) => {

  checkIfEquipmentExist(equipment);

  if (!exist) {
    return;
  } else {
    try {
      const res = await axios.post('https://reqres.in/api/users', {
        temperature: data.temperature,
        TEquipmentsId: equipment.id,
        date: Date.now()
      });
      console.log(res.data);
    } catch (err) {
      console.error(err);
    }
  }
};

