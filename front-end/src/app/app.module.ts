import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';

// Componetes
import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { GridComponent } from './components/grid/grid.component';
import { PacientesComponent } from './components/pacientes/pacientes.component';
import { ConsultaComponent } from './components/consulta/consulta.component';
import { ListPacientesComponent } from './components/pacientes/list-pacientes/list-pacientes.component';
import { FormPacientesComponent } from './components/pacientes/form-pacientes/form-pacientes.component';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule  } from '@angular/common/http';
@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    FooterComponent,
    GridComponent,
    PacientesComponent,
    ConsultaComponent,
    ListPacientesComponent,
    FormPacientesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
