
import React, { useState, createContext } from 'react'
export const BookContext = createContext();
export const BookProvider = (props) => {

    const [count, setCount] = useState(0);
    return (
        <BookContext.Provider
            value={count}>
                <h1>{count}</h1>
            {props.children}
        </BookContext.Provider>
    )

}