import { Injectable } from "@angular/core";

@Injectable({
  providedIn: "root"
})
export class UserService {
  constructor() {}
  isAdminRights(): boolean {
    if (localStorage.getItem("token")) {
      return true;
    } else {
      return false;
    }
  }
}
