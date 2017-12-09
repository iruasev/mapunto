import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { UserService } from "../services/user.service";

@Component({
    selector: 'login',
    templateUrl: '../views/login.html',
    providers: [
        UserService
    ]
})

export class LoginComponent implements OnInit {
    public title : string;
    public user;

    constructor(
        private _route: ActivatedRoute,
        private _router: Router,
        private _userService: UserService
    ){
        this.title = 'Componente de Login';
        this.user = {
            "username": "",
            "password": ""
        }
    }

    ngOnInit(){
        console.log('El componente login.component ha sido cargado!!');
    }

    onSubmit() {
        console.log(this.user);
        alert(this._userService.signup());
    }
}