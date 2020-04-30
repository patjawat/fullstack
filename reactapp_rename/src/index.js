import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import 'bootstrap/dist/css/bootstrap.min.css';

import { ApolloProvider } from '@apollo/react-hooks';

import { InMemoryCache } from 'apollo-cache-inmemory';
import { HttpLink } from 'apollo-link-http';
import { ApolloClient } from 'apollo-boost';
const cache = new InMemoryCache();

const client = new ApolloClient({
  cache,
  link: new HttpLink({
      // uri: 'https://48p1r2roz4.sse.codesandbox.io',
      uri: 'http://127.0.0.1:4000',
  }),
  
});


ReactDOM.render(
  <React.StrictMode>
    <ApolloProvider client={client}>
    <App />
    </ApolloProvider>
  </React.StrictMode>,
  document.getElementById('root')
);
