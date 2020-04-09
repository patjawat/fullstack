import { Injectable } from "@angular/core";
import { Subject, BehaviorSubject, Observable } from "rxjs";
import { environment } from "../../environments/environment";
import { HttpClient } from "@angular/common/http";
const url = environment.BASE_URL;

@Injectable({
  providedIn: "root"
})
export class AppService {
  rawData = [];
  // items = [];

  private list = new BehaviorSubject<string[]>([]);
  readonly list$ = this.list.asObservable();
  readonly items$ = this.list.asObservable();
  // don't use "any", type your data instead!
  private apiData = new BehaviorSubject<any>(null);
  public apiData$ = this.apiData.asObservable();

  constructor(private http: HttpClient) {}

  addNewList(list) {
    console.log(list);
    this.rawData.push(list);
    this.list.next(this.rawData);
  }

  removeList(list) {
    this.rawData = this.rawData.filter(v => v !== list);
    this.list.next(this.rawData);
  }

  create(data) {
    this.http.post(url + "mongo/products", data).subscribe(res => {
      console.log(this.loadItems());
    });
    // console.log(data);
  }
  loadItems() {
    return this.http.get(url + "mongo/products");
  }
}
