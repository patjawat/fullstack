import React, { Component, useState, useEffect } from 'react'
import axios from 'axios';
import { CounterContext } from '../hooks'
const Home = () => {
    const {count} = React.useContext(CounterContext);
  
    return (
        <div>
            <h1 className="text-center">Home : {count}</h1>
            
        </div>
    )


}


export default Home;