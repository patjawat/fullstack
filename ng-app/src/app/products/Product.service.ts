import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class ProductService {

private baseUrl = 'http://127.0.0.1:4000/products/';

constructor(private http:HttpClient) { }

create(data:Object): Observable<Object>{
  return this.http.post(this.baseUrl,data);
}

}
