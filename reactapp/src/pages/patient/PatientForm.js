import React, {  useState,createContext,useContext } from 'react';
import { useMutation } from '@apollo/react-hooks';
import gql from 'graphql-tag';
import {CREATE_PATIENT} from '../../gql/mutation/'
import {ALL_PATIENT} from '../../gql/query/'
import { CounterContext } from './hooks';



const PatientForm = (props) => {
    const [count]= useContext(CounterContext)
    const [patient, setPatient] = useState({})
    const [addTodo] = useMutation(CREATE_PATIENT);

    const handleInputChange = e => {
        const { name, value } = e.target
        setPatient({ ...patient, [name]: value })
    }

    const Edit = ()=> {
        setPatient({fullname:'dd',})
        console.log(patient)

      }
    const onSave = e => {
        if (!patient.fullname) return
        addTodo({ variables: patient,refetchQueries:[{query:ALL_PATIENT}] }).then(res =>{
            setPatient({fullname:''})
        });
        console.log(patient)

    }

    return (
        <div className="mb-3">
            {JSON.stringify(patient)}
    <h1>Login : {count}</h1>
                <div className="form-group">
                    <label for="">ชื่อ-นามสกุล</label>
                    <input type="text" name="fullname" value={patient.fullname} className="form-control" placeholder="ระบุชื่อ-นามสกุล" onChange={handleInputChange} />
                </div>
                <button type="submit" className="btn btn-primary" onClick={onSave}>Submit</button>
           <button onClick={Edit}>Update</button>
        </div>
    )

}

export default PatientForm