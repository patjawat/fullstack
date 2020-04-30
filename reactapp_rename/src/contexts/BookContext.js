
import React, { useState, createContext } from 'react'
export const BookContext = createContext();
export function BookProvider(props){

    const [count, setCount] = useState(20);
    return (
        <BookContext.Provider
            value={count}>
            {props.children}
        </BookContext.Provider>
    )

}