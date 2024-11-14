create database registro;
use registro;

create table empleados (
    id int (6) not null,
    nombre_completo varchar (255),
    email varchar (255),
    horario_ingreso time,
    horario_salida time,
    dias_trabajo varchar (255),
    PRIMARY KEY (id)
);

create table items (
    id int (6) AUTO_INCREMENT,
    idemp int (6) not null,  
    fecha datetime,
    tipo ENUM('Entrada', 'Salida') NOT NULL,
    primary key (id),
    FOREIGN KEY (idemp) REFERENCES empleados(id)
);


insert into empleados(id, nombre_completo, email, horario_ingreso, horario_salida, dias_trabajo) values (1, "Juan Castolo", 'juancastolo@gmail.com', 0900, 1800, 'Lunes, Martes, Jueves');
insert into empleados(id, nombre_completo, email, horario_ingreso, horario_salida, dias_trabajo) values (2, "Emi Telesca", 'elemiyt@gmail.com', 0900, 1800, 'Lunes, Jueves');
insert into empleados(id, nombre_completo, email, horario_ingreso, horario_salida, dias_trabajo) values (3, "Juanceto Cerouno", 'jc01@gmail.com', 1100, 2000, 'Martes, Jueves, Viernes');
insert into empleados(id, nombre_completo, email, horario_ingreso, horario_salida, dias_trabajo) values (4, "Ulises Ramos", 'nawja@gmail.com', 0500, 1400, 'Jueves, Viernes');
insert into empleados(id, nombre_completo, email, horario_ingreso, horario_salida, dias_trabajo) values (5, "Junior Espinola", 'juniorespinola@gmail.com', 0300, 2100, 'Lunes, Martes, Miercoles, Jueves, Viernes');