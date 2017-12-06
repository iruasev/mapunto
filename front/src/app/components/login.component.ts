import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

@Component({
    selector: 'login',
    templateUrl: '../views/login.html'
})

export class LoginComponent implements OnInit {
    public title : string;

    constructor(
        // private _route: ActivatedRoute,
        // private _router: Router
    ){
        this.title = 'Componente de Login';
    }

    ngOnInit(){
        console.log('El componente login.component ha sido cargado!!');
    }
}