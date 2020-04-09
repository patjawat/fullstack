import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppLayoutComponent } from '../_layout/app-layout/app-layout.component';
import { ActiveGuard } from '../active.guard';
import { ProductListComponent } from './product-list/product-list.component';
import { ProductCreateComponent } from './product-create/product-create.component';


const routes: Routes = [
  { 
    path: 'products',
    // component:CustomerComponent
    component: AppLayoutComponent,canActivate:[ActiveGuard],
    children: [
      { path: "product", component:ProductListComponent},
      { path: "create", component:ProductCreateComponent},
      // { path: '**', component: PagenofoundComponent,canActivate:[ActiveGuard] }
    ]
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProductsRoutingModule { }
