import { Injectable } from "@angular/core";
import "rxjs/add/operator/map";
import { Observable } from "rxjs/Observable";
import {GLOBAL} from "./global";
import {HttpClient, HttpResponse, HttpHeaders} from "@angular/common/http";

@Injectable()
export class UserService {
    public url: string;
    public identity;
    public token;

    constructor(private _http: HttpClient){
        this.url = GLOBAL.url
    }

    signup(){
        return "Hola desde el servicio";
    }
}