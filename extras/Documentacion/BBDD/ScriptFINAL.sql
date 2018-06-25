

CREATE DATABASE IF NOT EXISTS PW2;

USE PW2;

CREATE TABLE Rol(
idRol INT NOT NULL,
tipoRol VARCHAR(50),
PRIMARY KEY(idRol)
);

CREATE TABLE Empleado(
idEmpleado INT NOT NULL AUTO_INCREMENT,
dniEmpleado LONG,
cuitEmpleado LONG,
nombresEmpleado VARCHAR(50),
apellidosEmpleado VARCHAR(50),
fechaDeNacimiento DATE,
paisOrigenEmpleado VARCHAR(50),
telefonoEmpleado VARCHAR(50),
emailEmpleado VARCHAR(50),
tipoLicenciaConducir VARCHAR(50),
idRol INT,
PRIMARY KEY(idEmpleado , idRol),
FOREIGN KEY(idRol) REFERENCES Rol(idRol) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Login(
usuario NVARCHAR(50),
pass NVARCHAR (50),
idEmpleado INT,
PRIMARY KEY(usuario , idEmpleado),
FOREIGN KEY(idEmpleado) REFERENCES Empleado (idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE TipoVehiculo(
idTipoVehiculo INT PRIMARY KEY,
tipoVehiculo VARCHAR(50)
);

CREATE TABLE Vehiculo(
idVehiculo INT NOT NULL AUTO_INCREMENT,
patente NVARCHAR(10) NOT NULL,
marca NVARCHAR(20),
modelo NVARCHAR(25),
numeroDeChasis NVARCHAR(25),
numeroDeMotor NVARCHAR(25),
anioDeFabricacion INT,
costo INT,
capacidadCarga VARCHAR(50),
estadoVehiculo NVARCHAR(25),
kmVehiculo LONG,
proximoService INT,
idTipoVehiculo INT,
PRIMARY KEY(idVehiculo , idTipoVehiculo),
FOREIGN KEY (idTipoVehiculo) REFERENCES TipoVehiculo(idTipoVehiculo)  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Servicio(
idReparacion INT NOT NULL AUTO_INCREMENT,
fechaReparacion DATE,
descripcionReparacion VARCHAR(200),
costoReparacion FLOAT(8,2),
service BOOLEAN,
arregloExternoReparacion BOOLEAN,
arregloInternoReparacion BOOLEAN,
idEmpleado INT,
idVehiculo INT,
PRIMARY KEY(idReparacion, idEmpleado, idVehiculo),
FOREIGN KEY(idEmpleado) REFERENCES Empleado(idEmpleado)  ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(idVehiculo) REFERENCES Vehiculo(idVehiculo)  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE EstadoViaje(
idEstadoViaje INT,
tipoEstadoViaje VARCHAR(50),
PRIMARY KEY(idEstadoViaje)
);

CREATE TABLE Viaje(
idViaje INT NOT NULL AUTO_INCREMENT,
origenViaje VARCHAR(50),
destinoViaje VARCHAR(50),
fechaViaje DATE,
kmRecorridoPrevisto INT,
kmRecorridoReal INT,
combustibleConsumidoPrevisto INT,
combustibleConsumidoReal INT,
presupuestoViaje VARCHAR(45),
idEstadoViaje INT,
PRIMARY KEY(idViaje, idEstadoViaje),
FOREIGN KEY(idEstadoViaje) REFERENCES EstadoViaje(idEstadoViaje) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ChoferesDelViaje(
idEmpleado INT,
idViaje INT,
PRIMARY KEY(idViaje, idEmpleado),
FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(idEmpleado) REFERENCES Empleado(idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE VehiculosDelViaje(
idVehiculo INT,
idViaje INT,
PRIMARY KEY(idVehiculo, idViaje),
FOREIGN KEY(idVehiculo) REFERENCES Vehiculo(idVehiculo) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Ubicacion(
idUbicacion INT AUTO_INCREMENT,
horaUbicacion TIMESTAMP,
idEmpleado INT,
latitud DOUBLE,
longitud DOUBLE,
PRIMARY KEY(idUbicacion, idEmpleado),
FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE TipoReporte(
idTipoReporte INT AUTO_INCREMENT,
tipoReporte VARCHAR(100),
PRIMARY KEY(idTipoReporte)
);

CREATE TABLE Reporte(
idReporte INT AUTO_INCREMENT,
hora TIMESTAMP,
detalle VARCHAR(140),
latitud DOUBLE,
longitud DOUBLE,
kilometrajeVehiculo INT,
cantidadCombustible INT,
importeCombustible FLOAT(8,2),
idTipoReporte INT,
idEmpleado INT,
idViaje INT,
idVehiculo INT,
PRIMARY KEY(idReporte),
FOREIGN KEY (idTipoReporte) REFERENCES TipoReporte(idTipoReporte) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (idViaje) REFERENCES Viaje(idViaje) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (idVehiculo) REFERENCES Vehiculo(idVehiculo)ON DELETE CASCADE ON UPDATE CASCADE
);


/* -- A continuacion se ponen algunos insert para mostrar datos sin necesidad de cargarlos por los abm --*/

INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(1, 'administrador'),
(2, 'chofer'),
(3, 'mecanico'),
(4, 'supervisor'),
(5, 'sysadmin');


INSERT INTO `empleado`
(`idEmpleado`, `dniEmpleado`, `cuitEmpleado`, `nombresEmpleado`, `apellidosEmpleado`, `fechaDeNacimiento`, `paisOrigenEmpleado`, `telefonoEmpleado`, `emailEmpleado`, `tipoLicenciaConducir`, `idRol`) VALUES

/* administrador */
(1, 22454989, 20224549896, 'Jorge', 'Lopez', '1970-01-10', 'Argentina', 44226645, 'mail@empleado.com', 'A', 1),

/* choferes */
(2, 15635887, 20156358876, 'Mariano', 'Rodriguez', '1965-04-08', 'Argentina', 42659900, 'mail@logistruck.com', 'A5', 2),
(3, 17234432, 20172344326, 'Jose Mario', 'Acosta', '1960-05-12', 'Argentina', 44662277, 'mail@logistruck.com', 'A5', 2),
(4, 25677121, 20256771216, 'Fernando', 'Perez', '1976-01-10', 'Argentina', 20305341, 'mail@logistruck.com', 'A5', 2),
(6, 20754888, 20207548886, 'Jose Luis', 'Soto','1971-12-11', 'Argentina', 44568721, 'mail@logistruck.com', 'B', 2),
(9, 20154687, 20201546876, 'Rodolfo', 'Fernandez' , '1972-05-11', 'Argentina' , 44565478, 'mail@logistruck.com' , 'B', 2),

/* mecanico */
(5, 22444777, 20224447776, 'Juan', 'Gutierrez', '1973-05-12', 'Argentina', 44778822, 'mail@logistruck.com', 'A5', 3),

/* supervisor */
(7, 20623620, 20206236206, 'Felipe', 'Martinez', '1972-05-11', 'Argentina', 49781654, 'mail@logistruck.com', 'A', 4),

/* sysadmin*/
(8, 21444888, 20214448886, 'Facundo', 'Diaz', '1979-10-02', 'Argentina', 44433787, 'fdiaz@logistruck.com', 'A', 5);

INSERT INTO `login` (`usuario`, `pass`, `idEmpleado`) VALUES
('administrador', '12345', 1),
('chofer', '12345', 2),
('jmacosta', '12345', 3),
('mecanico', '12345', 5),
('supervisor', '12345', 7),
('sysadmin', '12345', 8);

INSERT INTO `tipovehiculo`(`idTipoVehiculo`, `tipoVehiculo`) VALUES
(1, 'Camion'),
(2, 'Acoplado');


/* Los acoplados tienen IdVehiculo desde serie 2000*/
INSERT INTO `vehiculo`
(`idVehiculo`, `patente`, `marca`, `modelo`, `numeroDeChasis`, `numeroDeMotor`, `anioDeFabricacion`, `costo`, `capacidadCarga`, `estadoVehiculo`, `kmVehiculo`, `proximoService`, `idTipoVehiculo`)
 VALUES
 (1, 'AA643DC', 'Iveco', 'Hi-Way 440', 'AS3635HT77', 'BE9902TT1', 2016, 350600, '780', 'Disponible', 1500, NULL, 1),
 (2, 'AA759DC', 'Scania', 'G 380', 'AS3635HT77', 'BE9902TT1', 2016, 350600, '780', 'Disponible', 1500, NULL, 1),
 (3, 'LEE670', 'Scania', 'P 230', 'AS3635HT77', 'BE9902TT1', 2012, 653600, '780', 'Disponible', 1500, NULL, 1),
 (4, 'AA978MM', 'Volvo', 'FH16', 'AS3635HT77', 'BE9902TT1', 2017, 350600, '780', 'Disponible', 1500, NULL, 1),
 (5, 'AA555EA', 'Iveco', 'American', 'AS3635HT77', 'BE9902TT1', 2016, 350600, '1240', 'Fuera de servicio', 1500, NULL, 2),
 (6, 'AB854UP', 'Iveco', 'Patagonia', 'AS3635HT77', 'BE9902TT1', 2017, 350600, '1340', 'Disponible', 1500, NULL, 2),
 (7, 'AB925UT', 'Iveco', 'American', 'AS3G36HTY90','BE9901TY2', 2015, 75200, '1540', 'Disponible', 1500, NULL, 2),
 (8, 'AB915UT', 'Scania', 'P 230', 'AS3G36HTY99','BE9901TY2', 2015, 35200, '1740', 'Fuera de servicio', 1500, NULL, 1),
 (9, 'AB745UT', 'Volvo', 'American', 'AS3G36DDY99','BE9901TY2', 2005, 45200, '1840', 'Disponible', 1500, NULL, 2),
 (10, 'AC945UT', 'Iveco', 'FH16', 'AS3G36NTY99','BE9901TY2', 2017, 78200, '1940', 'Fuera de servicio', 1500, NULL, 1);


 INSERT INTO `estadoviaje`(`idEstadoViaje`, `tipoEstadoViaje`)
  VALUES (1, "Planificado"),
  		 (2, "En curso"),
  		 (3, "Finalizado");


 INSERT INTO `viaje`(`idViaje`, `origenViaje`, `destinoViaje`, `fechaViaje`, `kmRecorridoPrevisto`, `kmRecorridoReal`, `combustibleConsumidoPrevisto`, `combustibleConsumidoReal`, `presupuestoViaje`, `idEstadoViaje`)
 VALUES
 (1,"CABA, ARG", "Villa Carlos Paz, Cordoba, ARG", '2017-11-27', 950, NULL, 1500, NULL, 4500, 1),
 (2,"La Plata, Buenos Aires, ARG", "Godoy Cruz, Mendoza, ARG", '2017-11-28', 1300, NULL, 1500, NULL, 5000, 1),
 (3,"CABA, ARG", "Rio Gallegos, Santa Cruz, ARG", '2017-11-28', 950, NULL, 1500, NULL, 4000, 1),
 (4,"Mendoza, ARG", "Rio Gallegos, Santa Cruz, ARG", '2017-11-29', 950, NULL, 1500, NULL, 4000, 1),
 (5,"CABA, ARG", "Bariloche, Rio Negro, ARG", '2017-11-30', 950, NULL, 1500, NULL, 4000, 1),
 (6,"CABA, ARG", "Necochea, Buenos Aires, ARG", '2017-11-30', 950, NULL, 1500, NULL, 4000, 1),
 (7,"CABA, ARG", "Termas de Rio Hondo, Santiago Del Estero, ARG", '2017-12-01', 950, NULL, 1500, NULL, 4000, 1),
 (8,"CABA, ARG", "Villa Maria, Cordoba, ARG", '2017-12-05', 950, NULL, 1500, NULL, 4000, 1);
 

/* asigno choferes a los viajes */
 INSERT INTO `ChoferesDelViaje`(`idViaje`, `idEmpleado`) VALUES (1,2), (2,2), (2,3), (3,3), (4,9), (5,2), (6,6), (7,4), (8,3);

/* asigno vehiculos a los viajes */
 INSERT INTO `VehiculosDelViaje`(`idViaje`, `idVehiculo`) VALUES (1,1), (1,6), (2,3), (2,6), (3,2), (3,9), (4,4), (5,4), (6,3), (7,1), (8,3);


/* Se cargan los tipos de reportes que el chofer puede realizar */
INSERT INTO `tiporeporte`(`idTipoReporte`, `tipoReporte`)
 VALUES
 	(1, "Inicia viaje"), (2, "Posicion actual"), (3, "Carga de combustible"), (4, "Desvio"), (5, "Kilometraje actual"), (6, "Finaliza viaje");
