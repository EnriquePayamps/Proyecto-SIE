import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PacientesComponent } from './components/pacientes/pacientes.component';
import { ConsultaComponent } from './components/consulta/consulta.component';
import { FormPacientesComponent } from './components/pacientes/form-pacientes/form-pacientes.component';

const routes: Routes = [
  { path: '', component: ConsultaComponent },
  { path: 'pacientes', component: PacientesComponent },
  { path: 'frompacientes', component: FormPacientesComponent }
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
