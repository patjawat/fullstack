<<<<<<< HEAD
import React,{useContext} from "react";
import "./App.css";
import {ShopProvider,ShopContext} from './hooks/cart'

const App = () => {
  const { count } = useContext(ShopContext)
  
  return (
    <ShopProvider>
    <div className="App">
      react Hook :
     
      <hr/>
      <h1>{JSON.stringify(count)}</h1>
    </div>
          
    </ShopProvider>
=======
import React from "react";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect,
  useHistory,
  useLocation
} from "react-router-dom";
import { LOGIN } from "./queries";
import { useMutation } from "@apollo/react-hooks";
import Header from './components/header'
import Cart from './components/cart'
import User from './pages/users/user'
import Patient from './pages/patient/patient'
import Home from '././components/home'
import './App.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faFingerprint } from '@fortawesome/free-solid-svg-icons'
import {CounterProvider} from './hooks'

export default function App() {
  return (
<CounterProvider>

      <div className="containers">
        <div className="app-wrapperx">
          <Router>
            <AuthButton />
            <div className="container mt-5 p-5 bg-white">
              <Switch>
                <PrivateRoute path="/cart">
                  <Cart />
                </PrivateRoute>
                <PrivateRoute path="/users">
                  <User />
                </PrivateRoute>
                <PrivateRoute path="/patient">
                  <Patient />
                </PrivateRoute>
                <PrivateRoute path="/">
                  <Home />
                </PrivateRoute>
              </Switch>
            </div>
          </Router>
        </div>
      </div>
</CounterProvider>

>>>>>>> 5403c85cc68a61378f489525634d710f8eedbcff
  );
};

<<<<<<< HEAD
export default App;
=======
function AuthButton() {
  let history = useHistory();
  return fakeAuth.isAuthenticated ? (
    <>
    <Header />
    </>
  ) : (
      <LoginPage />
    );
}

function PrivateRoute({ children, ...rest }) {
  return (
    <Route
      {...rest}
      render={({ location }) =>
        fakeAuth.isAuthenticated ? (
          children
        ) : (
            <Redirect
              to={{
                pathname: "/login",
                state: { from: location }
              }}
            />
          )
      }
    />
  );
}

const  LoginPage = ()=> {
  return (
    <div>
      <div className="card text-white bg-dark shadow-lg rounded wrapper-box" style={{ width:'30rem',maxWidth: '18rem;' }}>
        <div className="card-header">
          <h5><FontAwesomeIcon icon={faFingerprint} /> Authentication</h5>
          </div>
        <div className="card-body">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="email" class="form-dark" id="email" placeholder="Enter email" name="email"/>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-dark" id="pwd" placeholder="Enter password" name="pswd" />
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" /> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

        </div>
      </div>
    </div>
  );
}
>>>>>>> 5403c85cc68a61378f489525634d710f8eedbcff
