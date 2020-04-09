import { Component, OnInit } from "@angular/core";
import { Router, ActivatedRoute } from "@angular/router";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";

import { UsersService } from "../users.service";
import { from } from 'rxjs';

@Component({
  selector: "app-login",
  templateUrl: "./login.component.html",
  styleUrls: ["./login.component.css"]
})
export class LoginComponent implements OnInit {
  registerForm: FormGroup;
  submitted = false;
  public results:any;// กำหนดตัวแปร เพื่อรับค่า
  public massage:any;

  constructor(
    private formBuilder: FormBuilder,
    private userService : UsersService,
    private router:Router
    ) {}

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      username: ["", Validators.required],
      email: ["", [Validators.required, Validators.email]],
      password: ["", [Validators.required, Validators.minLength(6)]]
    });
  }

  get f() {
    return this.registerForm.controls;
  }

  onSubmit() {
    this.submitted = true;

    let data  = {
      'username' :this.f.username.value,
      'password' : this.f.password.value
    }
    this.userService.authen(data).subscribe(
      res => {
        // กรณี resuponse success
        this.results = res;
        this.massage = 'Login Success!';
        localStorage.setItem('token',this.results.token)
        this.router.navigate(['/home']);

      },
      err => {
        // กรณี error
        console.log('Something went wrong!');
        this.massage = 'ชื่อผู้ใช้หรืออรหัสผานไม่ถูกต้อง';
      }
    );
    // console.log('submit');

  }
}
