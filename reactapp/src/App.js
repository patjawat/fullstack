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
<div className="card bg-light mb-3" style={{maxWidth: '18rem;'}}>
  <div className="card-header">Header</div>
  <div className="card-body">
    <h5 className="card-title">Light card title</h5>
    <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div className="card text-white bg-dark mb-3 shadow-lg rounded" style={{maxWidth: '18rem;'}}>
  <div className="card-header">Header</div>
  <div className="card-body">
    <h5 className="card-title">Dark card title</h5>
    <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
    </div>
  );
}
