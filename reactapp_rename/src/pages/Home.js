import React from 'react'
import {ModalProvider} from '../hooks'
import HomeList from './HomeList'
export default function Home() {
  
    return (
        <ModalProvider>
            <h1 className="text-center">Home</h1>
            <HomeList />
        </ModalProvider>
    )
}
