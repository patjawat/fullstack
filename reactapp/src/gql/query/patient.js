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