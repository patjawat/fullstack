// src/context/main.js
import React, { createContext, useState } from "react";

const AppContext = createContext();
const AppContextProvider = ({ children }) => {
  let [state, setState] = useState({
    name: "Jane Doe",
    age: 20
  });
  const incrementAge = () => {
    setState(prevState => ({
      ...prevState,
      age: state.age + 1
    }));
  };
  const decrementAge = () => {
    setState(prevState => ({
      ...prevState,
      age: state.age - 1
    }));
  };

  return (
    <AppContext.Provider value={{ state, incrementAge, decrementAge }}>
      {children}
    </AppContext.Provider>
  );
};

export { AppContext, AppContextProvider };