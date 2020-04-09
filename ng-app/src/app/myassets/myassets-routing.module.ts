import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppLayoutComponent } from '../_layout/app-layout/app-layout.component';
import { ActiveGuard } from '../active.guard';
import { IndexComponent } from './index/index.component';
import { AssetFormComponent } from './asset-form/asset-form.component';
import { ProductComponent } from './product/product.component';

const routes: Routes = [
  { 
    path: 'assets',
    // component:CustomerComponent
    component: AppLayoutComponent,canActivate:[ActiveGuard],
    children: [
      { path: "index", component:IndexComponent},
      { path: "create", component:AssetFormComponent},
      { path: "product", component:ProductComponent},
      // { path: '**', component: PagenofoundComponent,canActivate:[ActiveGuard] }
    ]
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MyassetsRoutingModule { }
