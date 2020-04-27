import React from "react";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect,
  useHistory,
  useLocation
} from "react-router-dom";
import {LOGIN} from "./queries";
import { useMutation } from "@apollo/react-hooks";
import Header from './components/header'
import About from './components/about'
import Book from './pages/book'
import User from './pages/users/user'
import Patient from './pages/patient/patient'
import './App.css';

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

    {/* <Router>
      <AuthButton />
      <div className="container">
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
    </Router> */}
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
    <Header />
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
    authentication({ variables:{username:'admin',password:'112233'}}).then(res => {
      console.log(res.data.login)
    });
  };

  return (
    <div>
      <section className="login-page flex-center-center py-5 bg-light">
        <div className="w-100 mx-auto px-2" style={{ maxWidth: '400px' }}>
          <div className="text-center text-gray">
            <h2 className="weight-500 mb-1">Login</h2>
            <p className="h4 mb-2 weight-300">Please login to proceed</p>
          </div>
          <div className="card overflow-unset mt-9 mb-1">
            <div className="card-body">
              <div className="avatar-icon text-center">
                <img src="https://placehold.it/128x128" alt="Avatar"
                  className="img-circle img-cover card mb-2 ml-auto mr-auto p-1" />
              </div>
              <div className="group">
                <input type="text" className="form-control" placeholder="Email Address" />
              </div>
              <div className="group">
                <input type="password" className="form-control" placeholder="Password" />
              </div>
              <div className="group">
                <div className="custom-checkbox">
                  <input type="checkbox" value="remember me" id="rememberMe" />
                  <label for="rememberMe" className="text-gray">Remember Me</label>
                </div>
              </div>
              <div className="group">
                <button className="btn primary block btn-lg weight-500" onClick={login}>Login</button>
              </div>
            </div>
          </div>
          <div className="text-center weight-600 text-gray">
            <a href="" className="text-gray">Sign Up</a> · <a href="" className="text-gray">Forgot Password</a> · <a href=""
              className="text-gray">Need Help?</a>
          </div>
        </div>
      </section>
    </div>
  );
}
