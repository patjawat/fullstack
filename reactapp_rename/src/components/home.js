import React, { Component, useState, useEffect } from 'react'
import axios from 'axios';
const Home = () => {
    const [data, setData] = useState({ users: [] });
    useEffect(() => {
        const fetchData = async () => {
            // const result = await axios(
            //     'https://jsonplaceholder.typicode.com/users',
            // );

            // setData({
            //     users: result.data
            // });
        };

        fetchData();
    }, []);
    return (
        <div>
            <h1 className="text-center">Home : </h1>
            <button onClick={loadData}>loadding</button>
            <ul class="list-group">
                {data.users.map(user => (
                    <li key={user.id} class="list-group-item">{user.name}</li>
                ))}
            </ul>
        </div>
    )
   async function loadData(){
        console.log('loading data');
        const result = await axios(
            'https://jsonplaceholder.typicode.com/users',
        );
        setData({
            users: result.data
        });
    }

}


export default Home;