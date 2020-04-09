import { Component, OnInit,Input } from '@angular/core';
import {CustomerService} from '../customer.service'
import {Customer} from '../customer'
import { Observable } from 'rxjs';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-create-customer',
  templateUrl: './create-customer.component.html',
  styleUrls: ['./create-customer.component.css']
})
export class CreateCustomerComponent implements OnInit {

  customers:Observable<Customer[]>;
  customer: Customer = new Customer();

  registerForm: FormGroup;
  submitted = false;
 
  constructor(
    private customerService: CustomerService,
    private formBuilder: FormBuilder
    ) { }
 
  ngOnInit() {
    this.reloadData();

    this.registerForm = this.formBuilder.group({
      name: ['', Validators.required],
      // email: ['', [Validators.required, Validators.email]],
      qty: ['', [Validators.required, Validators.minLength(6)]]
    });
  }

  get f() {
    return this.registerForm.controls;
  }

 
  reloadData(){
    this.customers =this.customerService.getCustomersList();
  }

  newCustomer(): void {
    this.submitted = false;
    this.customer = new Customer();
  }
 
  save() {
    this.customerService.createCustomer(this.customer)
      .subscribe(data =>{
        this.reloadData();
      });
      this.customer = new Customer();
  }
 
  onSubmit() {
    this.submitted = true;
    // this.save();

    if (this.registerForm.invalid) {
      return;
    }
 

    console.log('name=' + this.f.name.value);
    console.log('qty=' + this.f.qty.value);
    
  }

}
