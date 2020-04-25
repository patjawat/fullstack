import React, {  useState } from 'react';
import { useMutation } from '@apollo/react-hooks';
import gql from 'graphql-tag';
import {CREATE_PATIENT} from '../../gql/mutation/'
import {ALL_PATIENT} from '../../gql/query/'





const PatientForm = (props) => {


    const initialFormState = {}
    const [patient, setPatient] = useState(initialFormState)
    const [addTodo, { data }] = useMutation(CREATE_PATIENT);

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
                    if (!patient.fullname) return
                    addTodo({ variables: patient,refetchQueries:[{query:ALL_PATIENT}] }).then(res =>{
                        
                    
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