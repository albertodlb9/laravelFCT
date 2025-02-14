# sistemaPracticasFP
Nos proponemos crear una aplicación web para la gestión de las actuaciones que realizan los alumnos en su período de formación en empresas dentro de la formación profesional.
Un alumno se conecta y guardará su acciones acometidas de cada jornada de trabajo en su formación.
En esta aplicación también podrá entrar y supervisar las acciones el profesor tutor asignado del centro educativo y el tutor laboral del alumno en la empresa.

## Roles dentro del sistema y casos de uso del mismo:
**(Todos los usuarios identificados podrán cambiar sus datos y su password)**
### Usuario no identificado en el sistema:
* Loguearse en el sistema
### Usuario Administrador del sistema:
* CRUD de Alumnos.
* CRUD de profesores tutores
* CRUD de tutores laborales.
### Usuario Profesor tutor
* CRUD alumnos
* CRUD acciones de sus alumnos
* Generar PDF de acciones de alumnos (lo dejaremos para el final)
### Usuario tutor laboral
* R acciones de sus alumnos
* R alumnos.
### Usuario Alumno
* CRUD acciones en la empresa

## Modelo entidad-relación aproximado
![Modelo E-R](ER-SistemaFCT.png)

