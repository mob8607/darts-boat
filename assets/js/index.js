import React from 'react';
import {render} from 'react-dom';
import Application from './components/Application';

const applicationElement = document.getElementById('app');

render(<Application />, applicationElement);
