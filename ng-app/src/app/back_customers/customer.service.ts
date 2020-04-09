import { Injectable } from "@angular/core";
import { HttpClient } from '@angular/common/http';

import { Customer } from "./customer";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: "root"
})
export class CustomerService {
  
  private baseUrl = 'http://localhost:3000/mongo/products';
  
  constructor(private http: HttpClient) { }

  getCustomersList():Observable<any>{
    return this.http.get(`${this.baseUrl}`);
  }
  createCustomer(customer: Object): Observable<Object> {
    return this.http.post(`${this.baseUrl}`, customer);
  }

  getCustomer(id: number): Observable<Object> {
    return this.http.get(`${this.baseUrl}/${id}`);
  }
 
  updateCustomer(id: number, value: any): Observable<Object> {
    return this.http.put(`${this.baseUrl}/${id}`, value);
  }
 
  deleteCustomer(id: number): Observable<any> {
    return this.http.delete(`${this.baseUrl}/${id}`, { responseType: 'text' });
  }
 

  getCustomersByAge(age: number): Observable<any> {
    return this.http.get(`${this.baseUrl}/age/${age}`);
  }
 
  deleteAll(): Observable<any> {
    return this.http.delete(`${this.baseUrl}` + `/delete`, { responseType: 'text' });
  }
}
