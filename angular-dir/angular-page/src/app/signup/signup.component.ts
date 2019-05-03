// johnny choi and sammy hecht signup component
import { Component, OnInit } from '@angular/core';
import { Signup } from '../signup';

// import { SignupService } from '../SignupService';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  title = 'Signup Page';
  /*
  signupForm: FormGroup;
  formBuilder: FormBuilder;

  // let's create a property to store a response from the back end
  // and try binding it back to the view
  responsedata = 'response data';


  signupModel: Signup[];
  */
  signupModel = new Signup('', '', '', '');
  responsedata = 'response data';


  constructor(private http: HttpClient) {
    // private formBuilder: FormBuilder
  }

  ngOnInit() {
    // this.signupForm = this.formBuilder.group({
    //   firstName: ['', Validators.required],
    //   lastName: ['', Validators.required],
    //   username: ['', Validators.required],
    //   password: ['', [Validators.required, Validators.minLength(6)]]
    // });
  }
  senddata(data) {
     console.log("hello");
     //console.log(data);
     let params = JSON.stringify(data);
     console.log(params);
     // no <string>
     this.http.post<string>('http://localhost/cs4640/cs4640/backend/ngphp-post.php', params)
     .subscribe((data) => {
        console.log('Got data from backend', data);
        //this.responsedata = JSON.parse(data).content.stat;

        document.getElementById('resp-text').innerHTML = "Thank you, you succesfully signed up.";

     }, (error) => {
       document.getElementById('resp-text').innerHTML = "Error signing up, try another email.";
       document.getElementById('resp-text').style.color = 'red';
        console.log('Error', error);
     })
  }
}
