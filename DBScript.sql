create database DBProyecto;
use DBProyecto;
create table docentes(
	iddocente varchar(10),
    nombre  varchar(40),
    apellido varchar(40),
    direccion  varchar(40),
    telefono int,
    dni  int,
    especialidad  varchar(40),
    email varchar(40),
    sexo varchar(10),
    primary key(iddocente)
);
create table alumnos(
	idalumno  varchar(10),
    nombre  varchar(40),
    apellido varchar(40),
    fechanac varchar(40),
    telefono int,
    sexo varchar(10),
    email varchar(40),
    distrito varchar(40),
    provincia varchar(40),
    departamento varchar(40),
    primary key(idalumno)
);
create table apoderados(
	dni int,
    nombre varchar(40),
    apellido varchar(40),
    sexo varchar(10),
    direccion varchar(40),
    estadocv varchar(40),
    telefono int,
    primary key(dni)
);
create table parentescos(
	dni   int,#dni del apoderado
    idalumno varchar(10),
    primary key(dni,idalumno),
    foreign key(dni) references apoderados(dni),
    foreign key(idalumno)references alumnos(idalumno)
);
create table colegios(
	idcolegio  varchar(10),
    nombre varchar(40),
    direccion varchar(40),
    tipo varchar(40),
    distrito varchar(40),
    provincia varchar(40),
    departamento varchar(40),
    primary key(idcolegio)
);
create table cursos(
	idcurso  varchar(10),
    nombre varchar(40),
    hteorica datetime,
    hpractica datetime,
    nivel varchar(40),
    grado varchar(40),
    primary key(idcurso)
);
create table aniosescolares(
	idanio varchar(10),
    fechaini datetime,
    fechafin datetime,
    estado varchar(10),
    primary key(idanio)
);
create table programaciones(
	idprogramacion  varchar(10),
    nivel varchar(40),
    grado varchar(40),
    seccion varchar(40),
    turno varchar(40),
    idanio varchar(10),
    cantidadmax  int,
    primary key(idprogramacion),
	foreign key(idanio)references aniosescolares(idanio)
);
create table aulas(
	idaula  varchar(10),
    tipo varchar(40),
    capacidad varchar(40),
    primary key(idaula)
);
create table notas(
	idcurso  varchar(10),
    idalumno  varchar(10),
    p1 double,
    p2 double,
    p3 double,
    promedio double,
    primary key(idcurso,idalumno),
    foreign key(idcurso)references cursos(idcurso),
    foreign key(idalumno)references alumnos(idalumno)
);
create table horarios(
	idhorario  varchar(10),
    fecha  datetime,
    horaini  datetime,
    horafin  datetime,
    idaula  varchar(10),
    iddocente  varchar(10),
    idcurso  varchar(10),
    idanio varchar(10),
	primary key(idhorario),
    foreign key(idaula)references aulas(idaula),
    foreign key(iddocente)references docentes(iddocente),
    foreign key(idcurso)references cursos(idcurso),
    foreign key(idanio)references aniosescolares(idanio)
);
create table matriculas(
	nromatricula varchar(10),
    id  varchar(10),
    fechamat datetime,
    nivel varchar(40),
    grado varchar(40),
    seccion varchar(40),
    turno varchar(40),
    situacion varchar(40),
    idalumno  varchar(10),
    idcolegio  varchar(10),
    dni int,		#este es el dni del apoderado
    idanio varchar(10),
    estado varchar(10),
    primary key(nromatricula,id),
    foreign key(idalumno)references alumnos(idalumno),
    foreign key(idcolegio)references colegios(idcolegio),
    foreign key(dni)references apoderados(dni),
    foreign key(idanio)references aniosescolares(idanio)
);

create table asignaciones(
	iddocente  varchar(10),
    idcurso  varchar(10),
    idanio varchar(10),
    primary key(iddocente,idcurso,idanio),
    foreign key(iddocente)references docentes(iddocente),
    foreign key(idcurso)references cursos(idcurso),
    foreign key(idanio)references aniosescolares(idanio)
);
