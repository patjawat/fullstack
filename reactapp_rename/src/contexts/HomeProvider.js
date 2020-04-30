import React,{useState,createContext} from 'react'

export const HomeContext = createContext();
export function HomeProvider(props){
    const [qty,setQty] = useState(0)
    return (
        <HomeContext.Provider>
            {props.children}
        </HomeContext.Provider>
    )
}

