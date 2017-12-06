import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

@Component({
    selector: 'register',
    templateUrl: '../views/register.html'
})

export class RegisterComponent implements OnInit {
    public title : string;

    constructor(
        // private _route: ActivatedRoute,
        // private _router: Router
    ){
        this.title = 'Componente de Register';
    }

    ngOnInit(){
        console.log('El componente register.component ha sido cargado!!');
    }
}