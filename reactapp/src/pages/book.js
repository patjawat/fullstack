import React from 'react'
import {BookProvider} from '../contexts/BookContext.js'
import bookList from './bookList.js'


const Book = () => {
    return (
        <BookProvider>
        {/* Book Hook : {count} */}
        <bookList />
        </BookProvider>
    )
}





export default Book