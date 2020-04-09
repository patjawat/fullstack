import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PostgreslqRoutingModule } from './postgreslq-routing.module';
import { IndexComponent } from './index/index.component';


@NgModule({
  declarations: [IndexComponent],
  imports: [
    CommonModule,
    PostgreslqRoutingModule
  ]
})
export class PostgreslqModule { }
