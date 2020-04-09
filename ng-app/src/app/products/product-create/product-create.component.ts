import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms'
import { MustMatch } from '../../_helpers/MustMatch';

@Component({
  selector: 'app-product-create',
  templateUrl: './product-create.component.html',
  styleUrls: ['./product-create.component.css']
})
export class ProductCreateComponent implements OnInit {
  productForm: FormGroup;
  submitted = false;

  constructor(private formBuilder: FormBuilder) { }
  ngOnInit(){
    this.productForm = this.formBuilder.group({
      productName :['',Validators.required]
  }, {
      validator: MustMatch('password', 'confirmPassword')
  });
  }

   // convenience getter for easy access to form fields
   get f() { return this.productForm.controls; }

   onSubmit() {
       this.submitted = true;

       // stop here if form is invalid
       if (this.productForm.invalid) {
           return;
       }

       // display form values on success
       alert('SUCCESS!! :-)\n\n' + JSON.stringify(this.productForm.value, null, 4));
   }

   onReset() {
       this.submitted = false;
       this.productForm.reset();
   }

}
