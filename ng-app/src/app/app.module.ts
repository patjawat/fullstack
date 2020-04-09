import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";

import { Work1Component } from "./work1/work1.component";
import { HttpClientModule } from "@angular/common/http";
import { HeaderComponent } from "./_layout/header/header.component";
import { HomeComponent } from "./home/home.component";
import { MongodbModule } from "./mongodb/mongodb.module";
import { PagenofoundComponent } from "./pagenofound/pagenofound.component";
import { PostgreslqModule } from "./postgreslq/postgreslq.module";
import { MysqlModule } from "./mysql/mysql.module";
import { NgbModule,NgbPaginationModule } from "@ng-bootstrap/ng-bootstrap";
import { AuthModule } from './auth/auth.module';
import { ReactiveFormsModule,FormsModule } from '@angular/forms';
// import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { UserService } from './user.service';


import { SiteLayoutComponent } from './_layout/site-layout/site-layout.component';
import { AppLayoutComponent } from './_layout/app-layout/app-layout.component';


import { AboutComponent } from './about/about.component';
import { RegisterComponent } from './register/register.component';
import { DashbroadComponent } from './dashbroad/dashbroad.component';
import { ProfileComponent } from './profile/profile.component';
import { ActiveGuard } from './active.guard';
import { CustomersModule } from './customers/customers.module';
import { ProductsModule } from './products/products.module';
import { MyassetsModule } from './myassets/myassets.module';




@NgModule({
  declarations: [
    AppComponent,
    Work1Component,
    HeaderComponent,
    HomeComponent,
    PagenofoundComponent,
    // AdminComponent,
    AppLayoutComponent,
    AboutComponent,
    RegisterComponent,
    DashbroadComponent,
    ProfileComponent,
    SiteLayoutComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    MongodbModule,
    PostgreslqModule,
    MysqlModule,
    NgbModule,
    NgbPaginationModule,
    AuthModule,
    ReactiveFormsModule,
    FormsModule,
    CustomersModule,
    ProductsModule,
    MyassetsModule
  ],
  providers: [ActiveGuard,UserService],
  bootstrap: [AppComponent]
})
export class AppModule {}
