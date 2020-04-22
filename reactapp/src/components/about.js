import React, { component, useState, useEffect } from 'react';


const About = () => {
    const [count, setCount] = useState(0);
    useEffect(()=>{
        // setCount({
        //     count: 0
        // })
    })

    return (
        <div>
            <h1 className="text-center">About</h1>
            <h1 className="text-center">Count : {count}</h1>
            {/* <button onClick={getCount} className="btn btn-primary">SetCount</button> */}
        </div>
    )
}

// const getCount = () =>{
//     alert('dds');
//     setCount({
//         count:count+1
//     })
// }

export default About;