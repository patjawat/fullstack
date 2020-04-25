import React from 'react'
import { Mutation } from "react-apollo";
import {DELETE_PATIENT} from "../../gql/mutation/patient"
import {ALL_PATIENT} from "../../gql/query/patient"
import { onError } from "apollo-link-error";

class DeletePatient extends React.Component {
  render(){
    const {id} = this.props;
    return (
      <Mutation
        mutation={DELETE_PATIENT}
        // update={(cache, { data: { deleteAddress } }) => {
        //   const { addresses } = cache.readQuery({ query: ALL_PATIENT });
        //   cache.writeQuery({
        //     query: ALL_PATIENT,
        //     data: { addresses: addresses.filter(e => e.id !== id) }
        //   });
        // }}
        >
        {deletePatient => (
          <div><a 
          className="btn btn-danger"
          onClick = {
            e => {
              e.preventDefault();
              deletePatient({ variables: {id:26}})
            }
          } data-tag = {id}>delete</a></div>
        )}
      </Mutation>
    );
  }
};

export default DeletePatient;