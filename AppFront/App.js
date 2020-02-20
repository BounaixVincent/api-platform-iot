import React, { Component } from 'react';
import Settings from './Settings';
import Home from './Home';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import 'react-native-gesture-handler';

const Stack = createStackNavigator();


export default class App extends Component {
  render() {
    return (
    <NavigationContainer>
      <Stack.Navigator initialRouteName="Home">
        <Stack.Screen name="Home" component={Home} />
        <Stack.Screen name="Settings" component={Settings} />
      </Stack.Navigator>
    </NavigationContainer>
    );
  }
}


// export default function App() {
//    return (
//      <View style={styles.container}>
//        <Text>Hello :)</Text>
//      </View>
//    );
//  }

//  const styles = StyleSheet.create({
//    container: {
//      flex: 1,
//      backgroundColor: '#fff',
//      alignItems: 'center',
//      justifyContent: 'center',
//    },
//  });
