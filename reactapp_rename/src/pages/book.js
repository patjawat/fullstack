import React from 'react'
import {BookProvider} from '../contexts/BookContext.js'
import BookList from './bookList'
import { AppContextProvider } from "../contexts/main";
import AppComponent from "../components/main";


const Book = () => {
    return (
        <AppContextProvider>
        <AppComponent />
      </AppContextProvider>
    )
}





export default Book