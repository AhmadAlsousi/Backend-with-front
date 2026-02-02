import React from 'react';
import ReactDOM from 'react-dom/client';

import App from './React/App';
import { BrowserRouter } from 'react-router-dom';


const root = ReactDOM.createRoot(document.getElementById('app')).render( <BrowserRouter>
    <App />
  </BrowserRouter>
);
