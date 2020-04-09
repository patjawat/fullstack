import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CustomerComponent } from './customer/customer.component';
import { AppLayoutComponent } from '../_layout/app-layout/app-layout.component';
import { ActiveGuard } from '../active.guard';
import { ListComponent } from './list/list.component';
import { CreateComponent } from './create/create.component';


const routes: Routes = [
  // {path:'customers',component:Customer}
  { 
    path: 'customers',
    // component:CustomerComponent
    component: AppLayoutComponent,canActivate:[ActiveGuard],
    children: [
      { path: "customer", component:CustomerComponent},
      { path: "create", component:CreateComponent},
      { path: 'list', component: ListComponent },
      // { path: '**', component: PagenofoundComponent,canActivate:[ActiveGuard] }
    ]
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CustomersRoutingModule { }
