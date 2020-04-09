import { Component, OnInit,Input } from '@angular/core';
import {CustomerService} from '../customer.service'
import {Customer} from '../customer'
import { Observable } from 'rxjs';
@Component({
  selector: 'app-customers-list',
  templateUrl: './customers-list.component.html',
  styleUrls: ['./customers-list.component.css']
})
export class CustomersListComponent implements OnInit {

  @Input() customers: Customer;
  // customers:Observable<Customer[]>;

  constructor(private customerService:CustomerService) { }

  ngOnInit() {
    // this.reloadData();
    // this.customers;
  }

  // reloadData(){
  //   this.customers =this.customerService.getCustomersList();
  // }

}
