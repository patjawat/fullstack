import React, {useContext} from "react";

import { AuthContext } from './context/Globalcontext';
import Login from './components/Login';
import Dashboard from './components/Dashboard';

const App = () => {
  const { state } = useContext(AuthContext);
  if (!state.isLoggedIn) 
    return <Login />;
  else
    return <Dashboard />
}

export default App;