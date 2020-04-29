import React,{useContext} from 'react'
import {BookContext} from '../contexts/BookContext'
export default function bookList() {
    const {count} = useContext(BookContext)
    return (
        <div>
            <h1>Book List : {count}</h1>
        </div>
    )
}
