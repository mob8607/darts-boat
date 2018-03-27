import React from 'react';
import {render} from 'react-dom';
import Application from './containers/Application';

const applicationElement = document.getElementById('app');

render(<Application />, applicationElement);
