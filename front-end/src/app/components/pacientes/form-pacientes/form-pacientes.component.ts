import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder}from '@angular/forms';
import { PacientesService } from 'src/app/services/pacientes.service';
@Component({
  selector: 'app-form-pacientes',
  templateUrl: './form-pacientes.component.html',
  styleUrls: ['./form-pacientes.component.css']
})
export class FormPacientesComponent implements OnInit {


  formPeciente:FormGroup;

  constructor( public formulario:FormBuilder,
                private pacientesServices:PacientesService) { 
    this.formPeciente = this.formulario.group({
      NOMBRE:[''],
      APELLIDO:[''],
      CEDULA:[''],
      EDAD:[''],
      TIPO_SANGRE:[''],  
      SEXO:[''],
      TEL_EMERGENCIA:[],
      DOC_ID:[1],
      DISPOSITIVO_MEDICO:[''],
      ENFERMEDADES_FRECUENTES:[''],
      MEDICAMENTOS_RECETADOS:['']
    })
  }

  ngOnInit(): void {
  }


  enviarDatos():any{
    console.log("acosador");
    console.log(this.formPeciente.value);
    this.pacientesServices.AgregarPaciente(this.formPeciente.value).subscribe()
  }

}
