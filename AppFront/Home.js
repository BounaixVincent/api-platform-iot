import React, { Component } from 'react';
import {Text, View, Button } from 'react-native';



export class Home extends Component {
  render() {
    return (
        <View>
        <Text>This is the Settings screen</Text>
        <Button onPress={() => this.props.navigation.navigate('Settings')} title="Settings"/>
      </View>
    )
  }
}

export default Home