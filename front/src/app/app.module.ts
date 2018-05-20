import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';

import {AppComponent} from './app.component';
import {NavbarComponent} from './shared/navbar/navbar.component';
import {HomeComponent} from './components/home/home.component';
import {PageNotFoundComponent} from './shared/page-not-found/page-not-found.component';
import { AboutComponent } from './components/about/about.component';

const appRoutes: Routes = [
  {path: 'about', component: AboutComponent},
  {path: 'home', component: HomeComponent},
  {path: '', redirectTo: 'home', pathMatch: 'full'},
  {path: '**', component: PageNotFoundComponent}
];

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    HomeComponent,
    PageNotFoundComponent,
    AboutComponent
  ],
  imports:      [
    BrowserModule,
    RouterModule.forRoot(
      appRoutes,
      // {enableTracing: true} // <-- debugging purposes only
    )
  ],
  providers:    [],
  bootstrap:    [AppComponent]
})
export class AppModule {
}
