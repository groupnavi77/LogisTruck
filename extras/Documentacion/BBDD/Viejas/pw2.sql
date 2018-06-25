DROP DATABASE IF EXISTS PW2;

CREATE DATABASE IF NOT EXISTS PW2;

USE PW2;

CREATE TABLE Rol(
idRol INT NOT NULL,
tipoRol VARCHAR(50),
PRIMARY KEY(idRol)
);

CREATE TABLE Empleado(
idEmpleado INT NOT NULL,
dniEmpleado LONG,
nombreEmpleado VARCHAR(50),
fechaDeNacimiento DATE,
telefonoEmpleado VARCHAR(50),
tipoLicenciaConducir VARCHAR(50),
ultimaModificacion VARCHAR(50),
ultimaPosicion VARCHAR(50),
idRol INT,
PRIMARY KEY(idEmpleado , idRol),
FOREIGN KEY(idRol) REFERENCES Rol(idRol)
);

CREATE TABLE Login(
usuario NVARCHAR(50),
pass NVARCHAR (50),
idEmpleado INT,
PRIMARY KEY(usuario , idEmpleado),
FOREIGN KEY(idEmpleado) REFERENCES Empleado (idEmpleado)
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
PRIMARY KEY(codigoReporteViaje,idEmpleado),
FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE TipoVehiculo(
idTipoVehiculo INT PRIMARY KEY,
tipoVehiculo VARCHAR(50)
);


CREATE TABLE Vehiculo(
idVehiculo INT NOT NULL,
patente NVARCHAR(10) NOT NULL,
marca NVARCHAR(20),
modelo NVARCHAR(25),
numeroDeChasis NVARCHAR(25),
numeroDeMotor NVARCHAR(25),
añoDeFabricacion DATE,
costo INT,
capacidadCarga VARCHAR(50),
kmVehiculo LONG,
proximoService INT,
idTipoVehiculo INT,
PRIMARY KEY(idVehiculo , idTipoVehiculo),
FOREIGN KEY (idTipoVehiculo) REFERENCES TipoVehiculo(idTipoVehiculo)
);

CREATE TABLE Servicio(
idReparacion INT NOT NULL,
fechaReparacion DATE,
descripcionReparacion VARCHAR(200),
costoReparacion FLOAT(8,2),
service BOOLEAN,
arregloExternoReparacion BOOLEAN,
arregloInternoReparacion BOOLEAN,
idEmpleado INT,
idVehiculo INT,
PRIMARY KEY(idReparacion , idEmpleado , idVehiculo),
FOREIGN KEY(idEmpleado) REFERENCES Empleado(idEmpleado),
FOREIGN KEY(idVehiculo) REFERENCES Vehiculo(idVehiculo)
);

CREATE TABLE EstadoViaje(
idEstadoViaje INT,
tipoEstadoViaje VARCHAR(50),
PRIMARY KEY(idEstadoViaje)
);

CREATE TABLE Viaje(
idViaje INT NOT NULL,
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
PRIMARY KEY(idViaje , idEstadoViaje),
FOREIGN KEY(idEstadoViaje) REFERENCES EstadoViaje(idEstadoViaje)
);


CREATE TABLE BitacoraChoferViaje(
idViaje INT ,
idEmpleado INT,
PRIMARY KEY(idViaje , idEmpleado),
FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje),
FOREIGN KEY(idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE BitacoraVehiculoViaje(
idVehiculo INT,
idViaje INT,
PRIMARY KEY(idVehiculo , idViaje),
FOREIGN KEY(idVehiculo) REFERENCES Vehiculo(idVehiculo),
FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje)
);



INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(1, 'administrador'),
(2, 'chofer'),
(3, 'mecanico'),
(4, 'supervisor');

INSERT INTO `empleado` (`idEmpleado`, `dniEmpleado`, `nombreEmpleado`, `fechaDeNacimiento`, `telefonoEmpleado`, `tipoLicenciaConducir`, `ultimaModificacion`, `ultimaPosicion`, `idRol`) VALUES
(1, NULL, 'empleado1', NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 'empleado2', NULL, NULL, NULL, NULL, NULL, 2),
(3, NULL, 'empleado3', NULL, NULL, NULL, NULL, NULL, 3),
(4, NULL, 'empleado4', NULL, NULL, NULL, NULL, NULL, 4);

INSERT INTO `login` (`usuario`, `pass`, `idEmpleado`) VALUES
('administrador', '12345', 1),
('chofer', '12345', 2),
('mecanico', '12345', 3),
('supervisor', '12345', 4);













