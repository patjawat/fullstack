import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { HomeComponent } from "./home/home.component";
import { PagenofoundComponent } from "./pagenofound/pagenofound.component";
import { ActiveGuard } from './active.guard';

import { AppLayoutComponent } from './_layout/app-layout/app-layout.component';
import { DashbroadComponent } from './dashbroad/dashbroad.component';
import { ProfileComponent } from './profile/profile.component';


const routes: Routes = [
// App routes goes here here
{ 
  path: '',
  component: AppLayoutComponent,canActivate:[ActiveGuard],
  children: [
    { path: "home", component: HomeComponent },
    { path: 'dashbroad', component: DashbroadComponent },
    { path: 'profile', component: ProfileComponent },
    // { path: '**', component: PagenofoundComponent,canActivate:[ActiveGuard] }
  ]
},

//no layout routes
// { path: 'login', component: LoginComponent},
// { path: 'register', component: RegisterComponent },
// otherwise redirect to home
// { path: '**', redirectTo: '' }

];

@NgModule({
  imports: [RouterModule.forRoot(routes, { enableTracing: false })],
  exports: [RouterModule]
})
export class AppRoutingModule {}
