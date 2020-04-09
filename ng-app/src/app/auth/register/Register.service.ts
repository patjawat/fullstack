import { Injectable} from '@angular/core';
import {Register} from'./register';
import { from, Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import {environment} from '../../../environments/environment'

@Injectable({
  providedIn: 'root'
})


export class RegisterService {
  
private url = environment.BASE_URL;

constructor(private http:HttpClient) { }

getRegister(register : object) : Observable<Object> {
  return this.http.post(this.url,register);

}

}
