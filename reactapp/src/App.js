import React from 'react';
import logo from './logo.svg';
import './App.css';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import Header from './components/header'
import Home from './components/home'
import About from './components/about'
import Book from './pages/book'
function App() {
  return (
    <div>
       <Router>
<Header />
      <div>

        {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
        <Switch>
          <Route path="/about">
            <About />
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
