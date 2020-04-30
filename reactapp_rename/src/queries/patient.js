import gql from "graphql-tag";
export const createPatient = gql`
{
    allPatient{
        id
      fullname
    }
  }
`;

export const ALL_PATIENT = gql`
{
    allPatient{
        id
      fullname
    }
  }
`;
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