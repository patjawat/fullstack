import React from 'react';
import { gql } from 'apollo-boost';
import { useQuery,useMutation } from '@apollo/react-hooks';
import { Mutation } from '@apollo/react-components';
import PatientForm from './PatientForm'
import {ALL_PATIENT} from '../../gql/query/'
import {DELETE_PATIENT} from '../../gql/mutation/'

// const [deletePatient, { data }] = useMutation(DELETE_PATIENT);



const Patient = props =>{
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
    const [deletePatient,{data}] = useMutation(DELETE_PATIENT);

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
                    <button className="btn btn-warning">Edit</button>{' '}
                   <DeleteTodo id={id}/>
                   
                </td>
            </tr>
            ))}
        </tbody>
    </table>
    
)
}

// const DeleteItem = ({id}) => {
//     <Mutation mutation={DELETE_PATIENT}>
//         {mutation => (<button>

//         </button>)}
//     </Mutation>
// }

const DeleteTodo = ({id}) => {
    return (
      <Mutation mutation={DELETE_PATIENT}
        // update={(cache, { data: { deletePatient } }) => {
        //   const { ALL_PATIENT } = cache.readQuery({ query: ALL_PATIENT });
        //   cache.writeQuery({
        //     query: GET_TODOS,
        //     data: { allTodos: allTodos.filter(e => e.id !== id)}
        //   });
        // }}
        >
        {(deletePatient, { data }) => (
          <button
          className="btn btn-danger"
            onClick={e => {
                deletePatient({
                variables: {
                  id
                }
              });
            }}
          >Delete</button>            
        )}
      </Mutation>
    );
  };
// methods: {
//     postLogin() {
//       this.$apollo
//         .mutate({
//           mutation: require("../gql/mutation/users").login,
//           variables: {
//             username: this.form.username,
//             password: this.form.password
//           }
//         })
//         .then(res => {
//           console.log(res.data.login);
//           const auth = res.data.login.token;
//           this.$store.commit("setAuth", auth); // mutating to store for client rendering
//           Cookie.set("auth", auth); // saving token in cookie for server rendering
//           this.$router.push("/");
//         })
//         .catch(err => {
//           console.log(err);
//         });
//     }
//   }