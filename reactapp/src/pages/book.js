import React, { useEffect, useState } from 'react'

const Book = () => {
    const usersData = [
        { id: 1, name: 'Tania', username: 'floppydiskette' },
        { id: 2, name: 'Craig', username: 'siliconeidolon' },
        { id: 3, name: 'Ben', username: 'benisphere' },
      ]
    const [users,setUsers] = useState(usersData);
    return (
        <div className="container">
            <h1>CRUD App with Hooks</h1>
            <div className="row">
                <div className="col-6">
                    <h2>Add user</h2>
                </div>
                <div className="col-6">
                    <h2>View users</h2>
                </div>
            </div>

        </div>
    )
}

export default Book