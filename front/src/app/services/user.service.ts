import {Injectable} from "@angular/core";
import "rxjs/add/operator/map";
import {Observable} from "rxjs/Observable";
import {GLOBAL} from "./global";
import {HttpClient, HttpResponse, HttpHeaders} from "@angular/common/http";

@Injectable()
export class UserService {
    public url: string;
    public user;
    public token;
    public error;

    constructor(private _http: HttpClient) {
        this.url = GLOBAL.url
    }

    signup(userToLogin) {
        let params = JSON.stringify(userToLogin);
        let headers = new HttpHeaders({'Content-Type': 'application/x-www-form-urlencoded'});

        return this._http.post(this.url + '/login', params, {headers: headers});
    }

    getUser() {
        let user = JSON.parse(localStorage.getItem('user'));

        if(user !== undefined){
            this.user = user;
        } else {
            this.user = null;
        }

        return this.user;
    }

    getToken() {
        let token = JSON.parse(localStorage.getItem('token'));

        if(token !== undefined){
            this.token = token;
        } else {
            this.token = null;
        }

        return this.token;
    }
}