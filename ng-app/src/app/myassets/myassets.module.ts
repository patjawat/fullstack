import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MyassetsRoutingModule } from './myassets-routing.module';
import { IndexComponent } from './index/index.component';
import { AssetFormComponent } from './asset-form/asset-form.component';
import { ProductComponent } from './product/product.component';


@NgModule({
  declarations: [IndexComponent, AssetFormComponent, ProductComponent],
  imports: [
    CommonModule,
    MyassetsRoutingModule
  ]
})
export class MyassetsModule { }
