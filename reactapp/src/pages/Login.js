import React from 'react'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faFingerprint } from '@fortawesome/free-solid-svg-icons'
export default function Login() {
    return (
            <div>
              <div className="card text-white bg-dark shadow-lg rounded wrapper-box" style={{ width:'30rem',maxWidth: '18rem;' }}>
                <div className="card-header">
                  <h5>
                  <FontAwesomeIcon icon={faFingerprint} /> Authentication
                  </h5>
                  </div>
                <div className="card-body">
                  <form action="/action_page.php">
            <div class="form-group">
              <label for="email">Email:</label>
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
          </form>
                </div>
              </div>
            </div>
          );
}
