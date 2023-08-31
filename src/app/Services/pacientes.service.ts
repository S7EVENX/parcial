import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment.prod';
import { IPacientes } from '../Interfaces/pacientes';

// primero esto 

const url = environment.url + "Libros.controllers.php?op=";
@Injectable({
  providedIn: 'root'
})
export class PacientesService {
  //despues esto 
  constructor(private http: HttpClient) { }
// lamamos al ipacientes de las intefaces 
  todos():Observable<IPacientes[]>{
    return this.http.get<IPacientes[]>(url + 'todos');
  }

  // a diferencia que aqui me va a venior el idpaciente

  uno(idPacientes:number):Observable<IPacientes>{
    // tambien creamos la variable pac 
    var pac = new FormData();
    pac.append('autor_id',idPacientes.toString())
    return this.http.post<IPacientes>(url + 'uno',pac);
  }

  insertar(paciente:IPacientes):Observable<string>{

    // poner tal y como esta en la base
    var pac = new FormData();
    pac.append('nombre',paciente.nombre)
    pac.append('descripción',paciente.descripcion)
    pac.append('precio',paciente.precio)
    pac.append('stock',paciente.stock.toString())
    pac.append('categoría_id',paciente.categoriaID.toString())
    return this.http.post<string>(url + 'insertar',pac);
  }
  actualizar(paciente:IPacientes, idPaciente:number):Observable<string>{
    var pac = new FormData();
    // pac.append('autor_id',idPaciente.toString())
    // pac.append('nacionalidad',paciente.nacionalidad)
    // pac.append('nombre',paciente.nombre)
    // pac.append('apellido',paciente.apellido)
    // pac.append('generofavorito',paciente.generofavorito.toString())
    // pac.append('bibliografia',paciente.bibliografia.toString())
    // pac.append('FechaNacimiento',paciente.FechaNacimiento.toString())
    pac.append('nombre',paciente.nombre)
    pac.append('descripción',paciente.descripcion)
    pac.append('precio',paciente.precio)
    pac.append('stock',paciente.stock.toString())
    pac.append('categoría_id',paciente.categoriaID.toString())
    return this.http.post<string>(url + 'actualizar',pac);
  }
  eliminar(idPacientes:number):Observable<string>{
    var pac = new FormData();
    pac.append('autor_id',idPacientes.toString())

    // los nombres van de acuerdo al api de la conexion de la base de datos 
    return this.http.post<string>(url + 'eliminar',pac);
  }
}
