import React, { Component, useState } from 'react';

const PatientForm = (props) => {
    const initialFormState = {  }
    const [patient, setPatient] = useState(initialFormState)
    const handleInputChange = e => {
        const { name, value } = e.target
        setPatient({ ...patient, [name]: value })
    }
    const savePAtient = e => {
        e.preventDefault()

        console.log(patient)
        setPatient({})
    }

    return (
        <div className="mb-3">
            {JSON.stringify(patient)}
            <form onSubmit={savePAtient}>
                <div className="form-group">
                    <label for="">ชื่อ-นามสกุล</label>
                    <input type="text" name="fullname" className="form-control" placeholder="ระบุชื่อ-นามสกุล" onChange={handleInputChange} />
                </div>
                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        </div>
    )

}

export default PatientForm