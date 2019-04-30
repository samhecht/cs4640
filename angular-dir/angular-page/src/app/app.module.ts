import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
// import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, FormBuilder, FormGroup, Validators } from '@angular/forms';



import { AppComponent } from './app.component';
// import { UserMoviesComponent } from './user-movies/user-movies.component';
import { SignupComponent } from './signup/signup.component';

@NgModule({
  declarations: [
    AppComponent,
    // UserMoviesComponent,
    SignupComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
