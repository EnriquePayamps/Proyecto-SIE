import { Component, OnInit } from '@angular/core';
import { PacientesService } from 'src/app/services/pacientes.service';
@Component({
  selector: 'app-list-pacientes',
  templateUrl: './list-pacientes.component.html',
  styleUrls: ['./list-pacientes.component.css']
})
export class ListPacientesComponent implements OnInit {
Pacientes:any;
  constructor(
    private pacienteService:PacientesService
  ) { }

  ngOnInit(): void {
    this.pacienteService.ObtenerPaciente().subscribe(data=>{
      console.log(data);
      this.Pacientes = data;
    })
  }

}
