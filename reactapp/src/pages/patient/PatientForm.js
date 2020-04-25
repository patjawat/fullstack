import React, {useContext } from 'react';
import { CounterContext } from './hooks';
const PatientForm = (props) => {
    const {action} = props;
    const { patient, handleInputChange, onSave, Edit } = props;
    const [count] = useContext(CounterContext)
    return (
        <div className="mb-3">
            <div className="form-group">
                <label for="">ชื่อ-นามสกุล</label>
                <input type="text" name="fullname" value={patient.fullname} className="form-control" placeholder="ระบุชื่อ-นามสกุล" onChange={handleInputChange} />
            </div>
          <GetACtion action={action} onSave={onSave}/>{' '}
          <button type="submit" className="btn btn-secondary" onClick={()=>{
              
          }}>ยกเลิก</button>
        </div>
    )
}


export default PatientForm

const GetACtion = (props) => {
    return props.action ? <button type="submit" className="btn btn-warning" onClick={props.onSave}>แก้ไข</button> : <button type="submit" className="btn btn-primary" onClick={props.onSave}>บันทึก</button>;
}
