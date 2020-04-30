import React, { createContext, useState } from "react";
export const PatientContext = createContext();
export const PatientProvider = (props) => {
  let [state, setState] = useState({
    name: "Jane Doe",
    age: 20
  });
  return (
  <PatientContext.Provider value={state}>
      {props.children}
      </PatientContext.Provider>
  );
};
