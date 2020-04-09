import { Component, OnInit } from "@angular/core";
import { environment } from "../../../environments/environment";
import { HttpClient } from "@angular/common/http";
import { Product } from "./product";
import { AppService } from "../App.service";
const url = environment.BASE_URL;

@Component({
  selector: "app-index",
  templateUrl: "./index.component.html",
  styleUrls: ["./index.component.css"]
})
export class IndexComponent implements OnInit {
  product = new Product(null, null, null);
  submitted = false;
  form: any = {};
  ttems:any = [];

  constructor(private http: HttpClient) {}

  ngOnInit() {
    // this.getData();
  }


  onSubmit() {
    // this.create();
  }

  async getData(){
    const data  =  await this.http.get(url + "mongo/products").toPromise();
    console.log(data);
    // this.items = data.result;
  }

  create(){
    const data =this.product;
    this.http.post(url + "mongo/products", data).subscribe(res => {
      this.getData();
      this.form = {}
    });
  }
  update(){

  }
  delete(data){
    let id = data._id;
    this.http.delete(url + "mongo/products/"+id).subscribe(res =>{
      // console.log(res)
      // this.getData();
    });
    // console.log(id)
  }

}
