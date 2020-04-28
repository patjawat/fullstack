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
import About from './components/about'
import Book from './pages/book'
import User from './pages/users/user'
import Patient from './pages/patient/patient'
import './App.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faFingerprint } from '@fortawesome/free-solid-svg-icons'

export const AuthContext = React.createContext(); // added this
const initialState = {
  isAuthenticated: false,
  user: null,
  token: null,
};

const reducer = (state, action) => {
  switch (action.type) {
    case "LOGIN":
      localStorage.setItem("user", JSON.stringify(action.payload.user));
      localStorage.setItem("token", JSON.stringify(action.payload.token));
      return {
        ...state,
        isAuthenticated: true,
        user: action.payload.user,
        token: action.payload.token
      };
    case "LOGOUT":
      localStorage.clear();
      return {
        ...state,
        isAuthenticated: false,
        user: null
      };
    default:
      return state;
  }
};


export default function App() {
  const [state, dispatch] = React.useReducer(reducer, initialState);
  return (
    <AuthContext.Provider
      value={{
        state,
        dispatch
      }}
    >
      <div className="containers">
        <div className="app-wrapperx">


          <Router>

            <AuthButton />
            <div>
              <Switch>
                <PrivateRoute path="/about">
                  <About />
                </PrivateRoute>
                <PrivateRoute path="/users">
                  <User />
                </PrivateRoute>
                <PrivateRoute path="/book">
                  <Book />
                </PrivateRoute>
                <PrivateRoute path="/patient">
                  <Patient />
                </PrivateRoute>
              </Switch>
            </div>
          </Router>
        </div>
      </div>
    </AuthContext.Provider>
  );
}

const fakeAuth = {
  isAuthenticated: false,
  authenticate(cb) {
    fakeAuth.isAuthenticated = true;
    setTimeout(cb, 100); // fake async
  },
  signout(cb) {
    fakeAuth.isAuthenticated = false;
    setTimeout(cb, 100);
  }
};

function AuthButton() {
  let history = useHistory();

  return fakeAuth.isAuthenticated ? (
    // <Header />
    <>
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

function LoginPage() {
  let history = useHistory();
  let location = useLocation();
  const [authentication] = useMutation(LOGIN);

  let { from } = location.state || { from: { pathname: "/" } };
  let login = () => {
    fakeAuth.authenticate(() => {
      history.replace(from);
    });
    // authentication({ variables:{username:'admin',password:'112233'}}).then(res => {
    //   console.log(res.data.login)
    // });
  };

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
    <button type="submit" class="btn btn-primary" onClick={login}>Submit</button>

        </div>
      </div>
    </div>
  );
}
