import React from "react";
import { Button } from 'reactstrap';
import { Mutation } from "react-apollo";
import { DELETE_PATIENT } from "../../gql/mutation/patient";
import { ALL_PATIENT } from "../../gql/query/";

class DeletePatient extends React.Component {
  render() {
    const { id } = this.props;
    return (
      <Mutation
        mutation={DELETE_PATIENT}
        onError={(response) => {
          console.log(response);
        }}
      >
        {(deletePatient) => (

          <Button color="danger"
          onClick={(e) => {
            e.preventDefault();
            deletePatient({
              variables: { id: id },
              refetchQueries: [{ query: ALL_PATIENT }],
            });
          }}
          >Delete</Button>
           
       
        )}
      </Mutation>
    );
  }
}

export default DeletePatient;
