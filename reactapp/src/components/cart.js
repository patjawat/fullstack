import React, { useState, useEffect } from 'react';
import { CounterContext } from '../hooks'

const Cart = () => {
    const { count, increment, decrement } = React.useContext(CounterContext);
    useEffect(() => {
    })

    return (
        <div>
            <h1 className="text-center">Cart</h1>
            <h1 className="text-center">Count : {count}</h1>
            <button onClick={increment}> Increment +</button>;
            <button onClick={decrement}> Increment +</button>;
        </div>
    )
}

export default Cart;