// src/component/main.js

import React, { useContext } from "react";
import { AppContext } from "../contexts/main";

const AppComponent = () => {
  const { state, incrementAge, decrementAge } = useContext(AppContext);
  return (
    <>
      <div>My name is {state.name}</div>
      <div>my age is {state.age}</div>
      <button onClick={incrementAge}>+1</button>
      <button onClick={decrementAge}>-1</button>
    </>
  );
};
export default AppComponent;
