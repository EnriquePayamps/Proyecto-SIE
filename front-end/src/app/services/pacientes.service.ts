import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Paciente } from '../modal/paciente';

@Injectable({
  providedIn: 'root'
})
export class PacientesService {
api:string ='http://localhost/SIE-Api/index.php/'
  constructor( private clienteHttp:HttpClient) {  }
  

  AgregarPaciente(datosPaciente:Paciente) :Observable<any>{
    return this.clienteHttp.post(this.api+"?insertar=1",datosPaciente)}

    ObtenerPaciente(){
      return this.clienteHttp.get(this.api)
    }
  }


