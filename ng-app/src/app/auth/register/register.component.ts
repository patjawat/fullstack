import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from "@angular/router";
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import {Register} from './register';
import { RegisterService} from './Register.service';
import { UsersService } from "../users.service";


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  registerForm: FormGroup;
  submitted = false;
 
  constructor(
    private formBuilder: FormBuilder,
    private userService : UsersService,
    private router:Router
    ) { }
 
  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      firstName: ['', Validators.required],
      lastName: ['', Validators.required],
      username: ['', Validators.required],
      password: ['', [Validators.required, Validators.minLength(6)]]
    });
  }
 
  get f() {
    return this.registerForm.controls;
  }
 
  onSubmit() {
    this.submitted = true;
 
    if (this.registerForm.invalid) {
      return;
    }
    let data = {
      firstName : this.f.firstName.value,
      lastName : this.f.lastName.value,
      username : this.f.username.value,
      password : this.f.password.value
    }
    this.userService.register(data).subscribe(
      res => {
        this.router.navigate(["/home"]);
      }
    )

console.log(data)
  }

}
