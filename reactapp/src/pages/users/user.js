import React, { Component, useState, useEffect } from 'react';
import UserTable from './userTable'
import AddUserForm from './AddUserForm'
const User = props => {

    const usersData = [
        { id: 1, name: 'Tania', username: 'floppydiskette' },
        { id: 2, name: 'Craig', username: 'siliconeidolon' },
        { id: 3, name: 'Ben', username: 'benisphere' },
    ]
    const initailFormState = { id: '', name: '', username: '' }
    const [users, setUsers] = useState(usersData);
    const [editing,setEditing] = useState(false);

    //เพิ่ม
    const addUser = user => {
        user.id = users.length + 1
        setUsers([...users, user])
    }
    const deleteUser = id => {
        setUsers(users.filter(user => user.id !== id))
      }

    return (
        <div className="container mt-3">
            <div className="row">
                <div className="col-6">
                    <AddUserForm addUser={addUser} />
                </div>
                <div className="col-6">
                    <UserTable users={users} />
                </div>
            </div>
        </div>
    )
}
export default User