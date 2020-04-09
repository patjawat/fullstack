import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  private baseUrl = 'http://127.0.0.1:4000/users/';

constructor(private http:HttpClient) { }
  authen(data: Object): Observable<Object> {
    return this.http.post(`${this.baseUrl}authenticate`, data);
  }

  register(data: Object): Observable<Object> {
    return this.http.post(`${this.baseUrl}register`,data);
  }
  



}
