import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProductsRoutingModule } from './products-routing.module';
import { ProductCreateComponent } from './product-create/product-create.component';
import { ProductListComponent } from './product-list/product-list.component';
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [ProductCreateComponent, ProductListComponent, ProductCreateComponent, ProductListComponent],
  imports: [
    CommonModule,
    ProductsRoutingModule,
    ReactiveFormsModule 
  ]
})
export class ProductsModule { }
