import { Component, OnInit } from "@angular/core";
import { AppService } from "../App.service";

@Component({
  selector: "app-items",
  templateUrl: "./items.component.html",
  styleUrls: ["./items.component.css"]
})

export class ItemsComponent implements OnInit {

  items = [];
  private locations : Location[] = [];

  constructor(private as: AppService) {}

  ngOnInit() {
  //   this.as.list$.subscribe(list => (this.list = list));
  //     this.as.loadItems().subscribe((res)=>{
  //     this.items = res.result;
  // });
  }

  remove(list) {
    this.as.removeList(list);
  }
}
