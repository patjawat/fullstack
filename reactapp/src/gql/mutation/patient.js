import gql from "graphql-tag";


export const CREATE_PATIENT = gql`
mutation createPatient($fullname: String!) {
    createPatient(fullname:$fullname ) {
    id
    fullname
  }
}
`;


export const DELETE_PATIENT = gql`
mutation deletePatient($id:ID!){
  deletePatient(id: $id)
}
`;
// export const DELETE_PATIENT = gql`
// mutation{
//   deletePatient(id: $id){
//     id
//   }
// }
// `;

