DROP DATABASE IF EXISTS PW2;

CREATE DATABASE IF NOT EXISTS PW2;

USE PW2;

CREATE TABLE Rol(
idRol INT NOT NULL AUTO_INCREMENT,
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
ultimaModificacion VARCHAR(50),
ultimaPosicion VARCHAR(50),
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
desvioViaje BOOLEAN,
kmRecorridoPrevisto INT,
kmRecorridoReal INT,
combustibleConsumidoPrevisto INT,
combustibleConsumidoReal INT,
codigoQR VARCHAR(50),
presupuestoViaje VARCHAR(45),
idEstadoViaje INT,
PRIMARY KEY(idViaje, idEstadoViaje),
FOREIGN KEY(idEstadoViaje) REFERENCES EstadoViaje(idEstadoViaje) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE BitacoraChoferViaje(
idEmpleado INT,
idViaje INT,
PRIMARY KEY(idViaje, idEmpleado),
FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(idEmpleado) REFERENCES Empleado(idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE BitacoraVehiculoViaje(
idVehiculo INT,
idViaje INT,
PRIMARY KEY(idVehiculo, idViaje),
FOREIGN KEY(idVehiculo) REFERENCES Vehiculo(idVehiculo) ON DELETE CASCADE ON UPDATE CASCADE, 
FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE BitacoraViaje(
codigoReporteViaje INT UNSIGNED  NOT NULL,
desviosViaje NVARCHAR(20),
kmViaje VARCHAR(20),
tipoCombustible NVARCHAR(20),
tiempoViaje DATE,
lugarCargaCombustible NVARCHAR(20),
cantidadCombustible SMALLINT,
importeCombustible FLOAT(8,2),
presentacionReporte NVARCHAR(20),
usoVehiculos INT,
tiempoFueraDeServicio TIME,
costoPorMantenimiento INT,
costoPorKmRecorrido INT,
promedioDeConsumoDeCombustible INT,
kmRecorridoEntreMantenimiento INT,
idEmpleado INT,
idViaje INT,
PRIMARY KEY(codigoReporteViaje, idEmpleado, idViaje),
FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (idViaje) REFERENCES Viaje(idViaje)ON DELETE CASCADE ON UPDATE CASCADE
);


/* -- A continuacion se ponen algunos insert para mostrar datos sin necesidad de cargarlos por los abm --*/

INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(1, 'administrador'),
(2, 'chofer'),
(3, 'mecanico'),
(4, 'supervisor'),
(5, 'sysadmin');


/* Los administradores tienen IdEmpleado desde serie 1000 */
/* Los choferes tienen IdEmpleado desde serie 2000 */
/* Los mecanicos tienen IdEmpleado desde serie 3000 */
/* Los supervisores tienen IdEmpleado desde serie 4000 */
/* El sysadmin tiene id 5000 */

INSERT INTO `empleado` 
(`idEmpleado`, `dniEmpleado`, `cuitEmpleado`, `nombresEmpleado`, `apellidosEmpleado`, `fechaDeNacimiento`, `paisOrigenEmpleado`, `telefonoEmpleado`, `emailEmpleado`, `tipoLicenciaConducir`, `ultimaModificacion`, `ultimaPosicion`, `idRol`) VALUES
(1000, 22454989, 20224549896, 'Jorge', 'Lopez', '1970-01-10', 'Argentina', 44226645, 'mail@empleado.com', 'A',NULL, NULL, 1),
(2000, 15635887, 20156358876, 'Mariano', 'Rodriguez', '1965-04-08', 'Argentina', 42659900, 'mail@empleado.com', 'A5', NULL, NULL, 2),
(2001, 17234432, 20172344326, 'Jose Mario', 'Acosta', '1960-05-12', 'Argentina', 44662277, 'mail@empleado.com', 'A5', NULL, NULL, 2),
(2002, 25677121, 20256771216, 'Fernando', 'Perez', '1976-01-10', 'Argentina', 20305341, 'mail@empleado.com', 'A5', NULL, NULL, 2),
(2003, 22444777, 20224447776, 'Juan', 'Gutierrez', '1973-05-12', 'Argentina', 44778822, 'mail@empleado.com', 'A5', NULL, NULL, 2),
(3000, 20754888, 20207548886, 'Jose Luis', 'Soto','1971-12-11', 'Argentina', 44568721, 'mail@empleado.com', 'B', NULL, NULL, 3),
(4000, 20623620, 20206236206, 'Felipe', 'Martinez', '1972-05-11', 'Argentina', 49781654, 'mail@empleado.com', 'A', NULL, NULL, 4),
(5000, 21444888, 20214448886, 'Facundo', 'Diaz', '1979-10-02', 'Argentina', 44433787, 'mail@empleado.com', 'A', NULL, NULL, 5);

INSERT INTO `login` (`usuario`, `pass`, `idEmpleado`) VALUES
('administrador', '12345', 1000),
('chofer', '12345', 2000),
('jmacosta', '12345', 2001),
('mecanico', '12345', 3000),
('supervisor', '12345', 4000),
('sysadmin', '12345', 5000);

INSERT INTO `tipovehiculo`(`idTipoVehiculo`, `tipoVehiculo`) VALUES 
(1, 'Camion'),
(2, 'Acoplado');


/* Los camiones tienen IdVehiculo desde serie 1000*/
/* Los acoplados tienen IdVehiculo desde serie 2000*/
INSERT INTO `vehiculo`
(`idVehiculo`, `patente`, `marca`, `modelo`, `numeroDeChasis`, `numeroDeMotor`, `anioDeFabricacion`, `costo`, `capacidadCarga`, `estadoVehiculo`, `kmVehiculo`, `proximoService`, `idTipoVehiculo`)
 VALUES 
 (1000, 'AA643DC', 'Iveco', 'Hi-Way 440', 'AS3635HT77', 'BE9902TT1', 2016, 350600, '780', 'Disponible', 1500, NULL, 1),
 (1001, 'AA759DC', 'Scania', 'G 380', 'AS3635HT77', 'BE9902TT1', 2016, 350600, '780', 'Disponible', 1500, NULL, 1),
 (1002, 'LEE670', 'Scania', 'P 230', 'AS3635HT77', 'BE9902TT1', 2012, 653600, '780', 'Disponible', 1500, NULL, 1),
 (1003, 'AA978MM', 'Volvo', 'FH16', 'AS3635HT77', 'BE9902TT1', 2017, 350600, '780', 'Disponible', 1500, NULL, 1),
 (2000, 'AA555EA', 'Iveco', 'American', 'AS3635HT77', 'BE9902TT1', 2016, 350600, '1240', 'Fuera de servicio', 1500, NULL, 2),
 (2001, 'AB854UP', 'Iveco', 'Patagonia', 'AS3635HT77', 'BE9902TT1', 2017, 350600, '1340', 'Disponible', 1500, NULL, 2);


 INSERT INTO `estadoviaje`(`idEstadoViaje`, `tipoEstadoViaje`)
  VALUES (1, "Planificado"),
  		 (2, "En curso"),
  		 (3, "Finalizado");

 INSERT INTO `viaje`(`idViaje`, `origenViaje`, `destinoViaje`, `fechaViaje`, `desvioViaje`, `kmRecorridoPrevisto`, `kmRecorridoReal`, `combustibleConsumidoPrevisto`, `combustibleConsumidoReal`, `codigoQR`, `presupuestoViaje`, `idEstadoViaje`) 
 VALUES
 (1,"Capital Federal, Argentina", "Villa Carlos Paz, Cordoba, Argentina", '2017-10-10', NULL, 950, NULL, NULL, NULL, NULL, NULL, 1),
 (2,"La Plata, Buenos Aires, Argentina", "Mendoza, Argentina", '2017-10-12', NULL, 1300, NULL, NULL, NULL, NULL, NULL, 1),
 (3,"Capital Federal, Argentina", "Rio Gallegos, Santa Cruz, Argentina", '2017-11-15', NULL, 950, 1500, NULL, NULL, NULL, 4000, 2);


 INSERT INTO `bitacorachoferviaje`(`idViaje`, `idEmpleado`) VALUES (2, 2000), (2, 2001);
 INSERT INTO `bitacoravehiculoviaje`(`idVehiculo`, `idViaje`) VALUES (1001, 2), (2001, 2);

 INSERT INTO `bitacorachoferviaje`(`idViaje`, `idEmpleado`) VALUES (3, 2002), (3, 2003);
 INSERT INTO `bitacoravehiculoviaje`(`idViaje`, `idVehiculo`) VALUES (3, 1002);



/* TABLA DE PRUEBA SOLO PARA PROBAR LA UBICACION, despues deberia ir en la tabla bitacoraViaje, porque la ubic. siempre es en los viajes */
CREATE TABLE Ubicacion(
idEmpleado INT,
latitud VARCHAR(50),
longitud VARCHAR(50),

PRIMARY KEY(idEmpleado),
FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado) ON DELETE CASCADE ON UPDATE CASCADE
);