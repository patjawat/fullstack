import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators,FormControl,FormArray} from '@angular/forms'
@Component({
  selector: 'app-product-create',
  templateUrl: './product-create.component.html',
  styleUrls: ['./product-create.component.css']
})
export class ProductCreateComponent implements OnInit {

  registerForm:FormGroup;

  submitted = false;
  staffForm = new FormGroup ({
    name: new FormControl()
  });  

  constructor( private fb: FormBuilder) { }


  ngOnInit() {
    this.registerForm = new FormGroup({
        'userData': new FormGroup({
            'email': new FormControl(null, [
                Validators.required,
                Validators.email]),
            'fullName': new FormControl(null, Validators.required),
            'sex': new FormControl('Male'),
            'username': new FormControl(null, Validators.required),
        }),
        'secret': new FormControl('car'),
        'hobbies': new FormArray([])
    });
}

  onAddHobby() {
    const control = new FormControl(null, Validators.required);
    (<FormArray>this.registerForm.get('hobbies')).push(control);
}
getHobbies() {
    return (<FormArray>this.registerForm.get('hobbies')).controls;
}

// ประกาศตัวแปร
user = {
  secret: '',
  userData: {
      email: '',
      fullName: '',
      sex: '',
      username: '',
  },
  hobbies: []
};

// ฟังก์ชั่น onSubmit
onSubmit() {
  this.submitted = true;

  const userData = this.user.userData;
  const registerForm = this.registerForm.value;

  this.user.secret = registerForm.secret;
  this.user.hobbies = registerForm.hobbies;
  userData.email = registerForm.userData.email;
  userData.fullName = registerForm.userData.fullName;
  userData.sex = registerForm.userData.sex;
  userData.username = registerForm.userData.username;
}
}
