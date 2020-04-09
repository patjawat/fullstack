import { Component, OnInit } from "@angular/core";
// import { Product } from "../index/product";
import { environment } from "../../../environments/environment";
import { HttpClient } from "@angular/common/http";
import { AppService } from "../App.service";

const url = environment.BASE_URL;
@Component({
  selector: "app-form",
  templateUrl: "./form.component.html",
  styleUrls: ["./form.component.css"]
})
export class FormComponent implements OnInit {
  // product = new Product(null, null, null);
  // submitted = false;
  // form: any = {};
  // Items = [];
  // listName: string;

  constructor(private http: HttpClient, private as: AppService) {}

  ngOnInit() {
    // this.getItems();
  }

  onSubmit() {
    // this.submitted = true;
    // this.create();
    // alert('save')
    // console.log(this.product);
    // this.as.create(this.product);

  }
  update() {}

  delete() {}

  // addNewList() {
  //   if (this.listName === "") {
  //     return;
  //   }

  //   this.as.addNewList(this.listName);
  //   this.listName = "";
  // }
}
