import React, {useState } from 'react';

const AddUserForm = (props) => {
    const initialFormState = { id: null, name: '', username: '' }
    const [user, setUser] = useState(initialFormState)
    const handleInputChange = event => {
        const { name, value } = event.target
      
        setUser({ ...user, [name]: value })
        console.log(name);
      }

    return (
        <div>
            {JSON.stringify(user)}
           <form
                onSubmit={event => {
                    event.preventDefault()
                    if (!user.name || !user.username) return

                    props.addUser(user)
                    setUser(initialFormState)
                }}
                >

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text"
                        class="form-control" name="name" placeholder="" onChange={handleInputChange} />
                </div>
                <div class="form-group">
                    <label for="">UserName</label>
                    <input type="text"
                        class="form-control" name="username" placeholder="" onChange={handleInputChange}/>
                </div>
                <button>Add new user</button>
            </form>
        </div>
    )
}

export default AddUserForm;
