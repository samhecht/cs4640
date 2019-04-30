import { Component, OnInit } from '@angular/core';
import { Signup } from '../signup';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  title = 'Signup Page';
  // signupForm: FormGroup;

  // let's create a property to store a response from the back end
  // and try binding it back to the view
  responsedata = 'response data';

  // drinks = ['Coffee', 'Tea', 'Milk'];
  signupModel = new Signup('Johnny', 'Choi', 'duh@uva.edu', '9991234567');

  constructor(private http: HttpClient) {
    // private formBuilder: FormBuilder
}

  ngOnInit() {
    // this.signupForm = this.FormBuilder.group({
    //   firstName: ['', Validators.required],
    //   lastName: ['', Validators.required],
    //   username: ['', Validators.required],
    //   password: ['', [Validators.required, Validators.minLength(6)]]
    // });
  }
  senddata() {
     // console.log(data);
     // console.log(this.signupForm.firstName);
     // let params = JSON.stringify(data);

     // this.http.post('http://localhost/4200/ngphp-post.php', {firstName: this.firstName})
     // .subscribe((data) => {
     //    console.log('Got data from backend', data);
     //    this.responsedata = data;
     // }, (error) => {
     //    console.log('Error', error);
     // })
  }
}
