import React,{useContext} from "react";
import "./App.css";
import {ShopProvider,ShopContext} from './hooks/cart'

const App = () => {
  const { count } = useContext(ShopContext)
  
  return (
    <ShopProvider>
    <div className="App">
      react Hook :
     
      <hr/>
      <h1>{JSON.stringify(count)}</h1>
    </div>
          
    </ShopProvider>
  );
};

export default App;
