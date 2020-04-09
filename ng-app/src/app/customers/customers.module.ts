import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CustomersRoutingModule } from './customers-routing.module';
import { CustomerComponent } from './customer/customer.component';
import { ListComponent } from './list/list.component';
import { ViewComponent } from './view/view.component';
import { CreateComponent } from './create/create.component';


@NgModule({
  declarations: [CustomerComponent, ListComponent, ViewComponent, CreateComponent],
  imports: [
    CommonModule,
    CustomersRoutingModule
  ]
})
export class CustomersModule { }
