import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { IndexComponent } from "./index/index.component";
import { ProductsComponent } from "./products/products.component";
import { ProductDetailComponent } from "./product-detail/product-detail.component";
import { ProductAddComponent } from './product-add/product-add.component';
import { ProductEditComponent } from './product-edit/product-edit.component';

const routes: Routes = [
  { path: "mongodb", component: ProductsComponent },
  {
    path: "mongodb/product-details/:id",
    component: ProductDetailComponent,
    data: { title: "Product Details" }
  },
  {
    path: 'mongodb/product-add',
    component: ProductAddComponent,
    data: { title: 'Add Product' }
  },
  {
    path: 'mongodb/product-edit/:id',
    component: ProductEditComponent,
    data: { title: 'Edit Product' }
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MongodbRoutingModule {}
