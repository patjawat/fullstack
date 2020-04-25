import React from "react";
import { Button } from 'reactstrap';
import { Mutation } from "react-apollo";
import { ALL_PATIENT,DELETE_PATIENT } from "../../queries";
import Swal from 'sweetalert2'
import withReactContent from 'sweetalert2-react-content'

const MySwal = withReactContent(Swal)
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 1000,
});

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
              title: 'ลอข้อมูลนี้?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText:'ยกเลิก',
              confirmButtonText: 'ใช่ ต้องการลบ!'
            }).then((result) => {
              if (result.value) {
                Toast.fire({
                  type: 'success',
                  title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
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


export default DeletePatient;
