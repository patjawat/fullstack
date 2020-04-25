import React, { useState } from "react";
import { useQuery, useMutation } from "@apollo/react-hooks";
import { ALL_PATIENT,CREATE_PATIENT } from "../../queries";
import { Button } from "reactstrap";
import DeletePatient from "./deletePatient";
import PatientForm from "./PatientForm";
import { CounterContextProvider } from "./hooks";
const Patient = () => {
  const [patient, setPatient] = useState({})
  const [action,setAction] = useState(false)
  const [addTodo] = useMutation(CREATE_PATIENT);

  const handleInputChange = e => {
    const { name, value } = e.target
    setPatient({ ...patient, [name]: value })
  }


  const onSave = e => {
    if (!patient.fullname) return
    addTodo({ variables: patient, refetchQueries: [{ query: ALL_PATIENT }] }).then(res => {
      setPatient({ fullname: '' })
    });
    console.log(patient)
  }


const Items = () =>{
  const { loading, error, data } = useQuery(ALL_PATIENT);
  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;
  return(
    <div>
      <table className="table table-bordered table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>Fullname</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        {data.allPatient.map((item, i) => {
          return (
            <tr key={item.id}>
            <td>{item.id}</td>
            <td>{item.fullname}</td>
            <td>
            <Button onClick={()=>{
                    console.log(item)
                    setPatient(item)
                    setAction(true)
                }}>แก้ไข</Button>{' '}
                
               <DeletePatient id={item.id} />
            </td>
          </tr>
          )
        }
        
        )}
      </tbody>
    </table>
    </div>
  )
}

  return (
    <CounterContextProvider>
      <h1 className="text-center text-primary">Patient</h1>
      <PatientForm
        patient={patient}
        handleInputChange={handleInputChange}
        onSave={onSave}
        action={action}
       
      />
      <Items />
    </CounterContextProvider>
  );
};

export default Patient;


