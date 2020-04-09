import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment} from "../../environments/environment";

const API = environment.BASE_URL;

// export const API_URL = {
//   url: BASE_URL + 'api',
// };


@Component({
  selector: 'app-work1',
  templateUrl: './work1.component.html',
  styleUrls: ['./work1.component.css']
})
export class Work1Component implements OnInit {


  constructor(private http: HttpClient) { }
  userData:any = [];

  ngOnInit() {
    // this.getData();
  
  }

  onSubmit(data){
      let postData = {username:data.username,password:data.password}
      this.http.post(API+'api',postData).subscribe(res => {
        this.getData()
      });
  }

  getData(){
    this.http.get(API+'api').subscribe(res => {
      // this.userData = res.data;
    });
  }
  delete(data){
    let id = data._id
    this.http.delete(API+'api/'+id).subscribe(res => {
      this.getData();
    });
  }

}
