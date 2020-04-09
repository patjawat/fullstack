import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MysqlRoutingModule } from './mysql-routing.module';
import { IndexComponent } from './index/index.component';


@NgModule({
  declarations: [IndexComponent],
  imports: [
    CommonModule,
    MysqlRoutingModule
  ]
})
export class MysqlModule { }
