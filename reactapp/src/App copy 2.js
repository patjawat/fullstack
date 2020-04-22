import React from 'react';
import './App.css';
import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import Header from './components/header'
import Home from './components/home'
import About from './components/about'
import Book from './pages/book'
import User from './pages/users/user'
import Patient from './pages/patient/patient'
import { DefaultLayout } from './components';
function App() {
  return (
    <div>
       <Router>
<Header />
      <div>

        {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
        <Switch>
          <Route path="/patient">
            <Patient />
          </Route>
          <Route path="/about">
            <About />
          </Route>
          <Route path="/users">
            <User />
          </Route>
          <Route path="/book">
            <Book />
          </Route>
          <Route path="/">
            <Home />
          </Route>
        </Switch>
      </div>
    </Router>
      <div className="container">

      </div>
    </div>
  );
}

export default App;
