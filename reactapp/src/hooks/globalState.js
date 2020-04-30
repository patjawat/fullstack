import React from 'react'

export const CounterContext = React.createContext();

export const CounterProvider = ({ children }) => {
    const [count, setCount] = React.useState(0);
    const [hello, setHello] = React.useState("Hello world");
    const increment = () => setCount(counter => counter + 1);
    const decrement = () => setCount(counter => counter - 1);
  
    const value = {
        count,
        increment,
        decrement,
        hello
      };

    return (
        <CounterContext.Provider value={value}>{children}</CounterContext.Provider>
    );
}