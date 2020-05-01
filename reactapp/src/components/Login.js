import React from "react";
import "../App.css";
import { AuthContext } from "../context/Globalcontext";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faFingerprint } from '@fortawesome/free-solid-svg-icons'
const LoginPage = () => {
  const { state, login } = React.useContext(AuthContext);

  return (
    <div className="containers">
      <div className="card text-white bg-dark mb-3 shadow-lg rounded">
        <div className="card-header">
            <h4><FontAwesomeIcon icon={faFingerprint}/>  Authentication</h4>
            </div>
        <div className="card-body">
          <h5 className="card-title">Dark card title</h5>
          <p className="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
            <button onClick={login}>Login</button>
          </p>
        </div>
      </div>
    </div>
  );
};
export default LoginPage;
