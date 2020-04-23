import React from 'react';
import { gql } from 'apollo-boost';
import { useQuery } from '@apollo/react-hooks';
import PatientForm from './PatientForm'
import {createPatient} from '../../gql/query/'
const EXCHANGE_RATES = gql`
{
    allPatient{
        id
      fullname
    }
  }
`;

const Patient = props =>{
     return(
         <div>
             <h1 className="text-center text-primary">Patient</h1>
             <PatientForm />
             <Items />
         </div>
     )

     function Items() {
        const { loading, error, data } = useQuery(createPatient);
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
            </tr>
        </thead>
        <tbody>
            {props.data.map(({ id,fullname }) => (
            <tr key={id}>
                <td>{id}</td>
                <td>{fullname}</td>
            </tr>
            ))}
        </tbody>
    </table>
    
)
}

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