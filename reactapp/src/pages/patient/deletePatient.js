import React from "react";
import { Button } from 'reactstrap';
import { Mutation } from "react-apollo";
import { DELETE_PATIENT } from "../../gql/mutation/patient";
import { ALL_PATIENT } from "../../gql/query/";
import Swal from 'sweetalert2'
import withReactContent from 'sweetalert2-react-content'

const MySwal = withReactContent(Swal)


const DeletePatient = (props) => {
  const id = props.id;
  return (
    <Mutation
      mutation={DELETE_PATIENT}
      onError={(response) => {
        console.log(response);
      }}>
      {(deletePatient) => (
        <Button color="danger"
          onClick={(e) => {
            e.preventDefault();
            MySwal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                MySwal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                deletePatient({
                  variables: { id: id },
                  refetchQueries: [{ query: ALL_PATIENT }],
                });
              }
            })
           
          }}>Delete</Button>
      )}
    </Mutation>
  );
}

const confirmDelete = () => {
  MySwal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      MySwal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  })
}

export default DeletePatient;
