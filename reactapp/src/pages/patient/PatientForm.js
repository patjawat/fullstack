import React, { Component, useState } from 'react';
import { useMutation,useQuery } from '@apollo/react-hooks';
import gql from 'graphql-tag';




const PatientForm = (props) => {

    const ADD_TODO = gql`
    mutation createPatient($fullname: String!) {
        createPatient(fullname:$fullname ) {
        id
        fullname
      }
    }
  `;

  const EXCHANGE_RATES = gql`
{
    allPatient{
        id
      fullname
    }
  }
`;

    const initialFormState = {}
    const [patient, setPatient] = useState(initialFormState)
    const [addTodo, { data }] = useMutation(ADD_TODO);

    const handleInputChange = e => {
        const { name, value } = e.target
        setPatient({ ...patient, [name]: value })
    }

    return (
        <div className="mb-3">
            {JSON.stringify(patient)}
            <form
                onSubmit={e => {
                    e.preventDefault();
                    // addTodo({ variables: patient }).then(res =>{
                    //     console.log(res.data.createPatient)
                    // });
                    if (!patient.fullname) return
                    addTodo({ variables: patient,refetchQueries:[{query:EXCHANGE_RATES}] }).then(res =>{
                    });
                }}
            >
                <div className="form-group">
                    <label for="">ชื่อ-นามสกุล</label>
                    <input type="text" name="fullname" className="form-control" placeholder="ระบุชื่อ-นามสกุล" onChange={handleInputChange} />
                </div>
                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        </div>
    )

}

export default PatientForm