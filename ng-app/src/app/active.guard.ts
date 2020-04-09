import { Injectable } from '@angular/core';
import { CanActivate, CanActivateChild, CanLoad, Route, UrlSegment, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { Observable } from 'rxjs';
import  {UserService} from './user.service'

@Injectable({
  providedIn: 'root'
})
export class ActiveGuard implements CanActivate, CanActivateChild, CanLoad {

  constructor(
    private userservice:UserService,
    private router:Router
    ){}

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    // return true;
    if(this.userservice.isAdminRights()){
      console.log('Login Succes')
      return true;
    }else{
      // alert('Not posemision');
      console.log('Login Fail')
      this.router.navigate(['/users/login']);
    }
  }
  canActivateChild(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    return true;
  }
  canLoad(
    route: Route,
    segments: UrlSegment[]): Observable<boolean> | Promise<boolean> | boolean {
    return true;
  }
}
