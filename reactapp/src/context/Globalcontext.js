import React, { useState } from "react";
import { useSetState } from "react-use";

export const AuthContext = React.createContext(null);

const initialState = {
  isLoggedIn: false,
  isLoginPending: false,
  loginError: null,
};

export const GlobalProvider = (props) => {
  const [state, setState] = useSetState(initialState);

  const login = () => {
    setState({
      isLoggedIn: true,
      isLoginPending: false,
      loginError: null
    })
  };

  return (
    <AuthContext.Provider
      value={{
        state,
        setState,
        login
      }}
    >
      {props.children}
    </AuthContext.Provider>
  );
};
