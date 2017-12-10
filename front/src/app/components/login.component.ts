import {Component, OnInit} from '@angular/core';
import {Router, ActivatedRoute, Params} from '@angular/router';
import {UserService} from "../services/user.service";

@Component({
    selector: 'login',
    templateUrl: '../views/login.html',
    providers: [
        UserService
    ]
})

export class LoginComponent implements OnInit {
    public title: string;
    public user;
    public token;
    public error;

    constructor(private _route: ActivatedRoute,
                private _router: Router,
                private _userService: UserService) {
        this.title = 'Componente de Login';
        this.user = {
            "username": "",
            "password": ""
        }
    }

    ngOnInit() {
        console.log('El componente login.component ha sido cargado!!');
        console.log(this._userService.getToken());
        console.log(this._userService.getUser());
    }

    onSubmit() {
        console.log(this.user);
        //GET TOKEN
        this._userService.signup(this.user).subscribe(
            response => {
                this.token = response;
                if (this.token.length <= 1) {
                    console.log("Error en el servidor");
                } else if (! this.token.status) {
                    this.error = null;
                    localStorage.setItem('token', JSON.stringify(this.token));
                    let explodedToken = JSON.stringify(this.token).split(".");
                    let userData = atob(explodedToken[1]);
                    localStorage.setItem('user', userData);
                }
            },
            error => {
                this.token = null;
                this.error = error;
            }
        );
    }

}