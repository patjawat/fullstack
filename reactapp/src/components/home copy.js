import React, { Component, useState,useEffect } from 'react'
import axios from 'axios';
const Home = () => {
    const [data, setData] = useState({ users: [] });
    useEffect(() => {
        const fetchData = async () => {
          const result = await axios(
            'https://jsonplaceholder.typicode.com/users',
          );
    
          setData({
            users: result.data
          });
        };
    
        fetchData();
      }, []);
    return (
        <div>
            <h1>Home : </h1>
            <ul>
                {data.users.map(user => (
                    <li key={user.id}>
                        {user.name}
                    </li>
                ))}
            </ul>
        </div>
    )

}


export default Home;