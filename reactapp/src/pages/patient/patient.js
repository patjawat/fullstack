import React from 'react';
// import { gql } from 'apollo-boost';
import { useQuery,useMutation } from '@apollo/react-hooks';
// import { Mutation } from '@apollo/react-components';
import PatientForm from './PatientForm'
import {ALL_PATIENT} from '../../gql/query/'
import {DELETE_PATIENT} from '../../gql/mutation/'
import {Button} from 'reactstrap'
import DeletePatient from './deletePatient';

// const [deletePatient, { data }] = useMutation(DELETE_PATIENT);



const Patient = () =>{
     return(
         <div>
             <h1 className="text-center text-primary">Patient</h1>
             <PatientForm />
             <Items />
         </div>
     )

     function Items() {
         
         const { loading, error, data } = useQuery(ALL_PATIENT);
         if (loading) return <p>Loading...</p>;
         if (error) return <p>Error :(</p>;
            return <ViewTables data={data.allPatient}/>
        }
        
}

export default Patient;

const ViewTables = (props) => {

return(
    <table className="table table-bordered table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Fullname</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {props.data.map(({ id,fullname }) => (
            <tr key={id}>
                <td>{id}</td>
                <td>{fullname}</td>
                <td>
                   <Button color="warning">Edit</Button>{' '}
                    <DeletePatient id = {id}/>
                </td>
            </tr>
            ))}
        </tbody>
    </table>
    
)


}
