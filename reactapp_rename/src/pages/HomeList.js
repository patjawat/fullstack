import React,{useContext} from 'react'

import { ModalProvider, ModalContext,PatientContext } from '../hooks'
const HomeList=()=> {
    const { signupOpen, signinOpen } = useContext(ModalContext)
    const { state } = useContext(PatientContext)

    return (
        <div>
            {signinOpen}List Home : {signupOpen}
            <div>My name is {state.name}</div>
      <div>my age is {state.age}</div>
        </div>
    )
}

export default HomeList;