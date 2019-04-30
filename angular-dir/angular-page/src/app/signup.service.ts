// import { Injectable } from '@angular/core';
// import { catchError, map, tap } from 'rxjs/operators';
// import { HttpClient, HttpHeaders } from '@angular/common/http';
// import { Signup } from './signup';
//
// @Injectable({
//   providedIn: 'root'
// })
// export class SignupService {
//
//   constructor(private http: HttpClient) { }
// }
// addUser (user: Signup): Observable<Signup> {
//   return this.http.post<Signup>(this.heroesUrl, user, httpOptions).pipe(
//     tap((newUser: Signup) => this.log(`added user w/ id=${newUser.id}`)),
//     catchError(this.handleError<Signup>('addUser'))
//   );
// }
