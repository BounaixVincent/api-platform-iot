import React from 'react';
import { Router, Stack } from 'react-native-router-flux';
import BookTemperature from './routes/book';

const RouterComponent = () => {
  return (
      <Router>
        <Stack key="root">
          {BookTemperature}
        </Stack>
      </Router>
  );
};

export default RouterComponent;