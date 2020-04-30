import React,{createContext,useState} from 'react'
export const ShopContext = createContext();
export const ShopProvider = ({children}) => {
    const [count,setcount] = useState(20)
    return(
        <ShopContext.Provider value={{count}}>
            {children}
        </ShopContext.Provider>
    );
}