import React,{useContext} from 'react'
import {BookContext} from '../contexts/BookContext'
const BookList = () => {
    const {count} = useContext(BookContext)
    return (
        <div>
            <h1>Book List : {count}</h1>
        </div>
    )
}
export default BookList;
