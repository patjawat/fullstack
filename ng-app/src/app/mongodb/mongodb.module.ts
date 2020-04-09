import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MongodbRoutingModule } from './mongodb-routing.module';
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { ItemsComponent } from './items/items.component';
import { FormsModule } from "@angular/forms";
import { ProductsComponent } from './products/products.component';
import { ProductDetailComponent } from './product-detail/product-detail.component';
import { ProductAddComponent } from './product-add/product-add.component';
import { ProductEditComponent } from './product-edit/product-edit.component';


@NgModule({
  declarations: [IndexComponent, FormComponent, ItemsComponent, ProductsComponent, ProductDetailComponent, ProductAddComponent, ProductEditComponent],
  imports: [
    CommonModule,
    MongodbRoutingModule,
    FormsModule
  ]
})
export class MongodbModule { }
