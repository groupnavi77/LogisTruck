<p align="center"><img src="http://i410.photobucket.com/albums/pp182/nacho_0804/img/logo1_zpsg8dv3qbn.png"></p>

# LogisTruck - Sistema de logística de vehículos

Trabajo Práctico Final – Programación Web II (2017)
------------------------------------

Tecnicatura en Desarrollo Web - Universidad Nacional de La Matanza, ARG
2° Cuatrimestre 2017


Grupo de Trabajo:
------------------------------------

+ Jerónimo Romero Tricarico: (https://github.com/jerotrica)
+ Ignacio Castiñeira: (https://github.com/nachocastineira)
+ Fernando Carreño: (https://github.com/ferezecarr)
+ Damián Villarreal: (https://github.com/damian-villarreal)

Descripción general del sistema:
------------------------------------

Una empresa dedicada a la logística necesita un sistema informático para controlar su flota de vehículos.

El control de los distintos tipos de vehículos es muy importante para ella, sobre todo en lo que respecta a
su mantenimiento y estado general.

La empresa realiza viajes a todo el país y los países limítrofes.

El sistema debe permitir el acceso desde cualquier conexión a internet, puesto que los choferes deben actualizar datos en el mismo durante los viajes.

Se desea que el sistema permita al menos tres niveles de acceso (roles), el chofer que utilizará el sistema para actualizar los datos durante el viaje, el administrador que realizara las tareas de carga y consulta de
los datos en las oficinas centrales y el supervisor, encargado de administrar el sistema, trabajar con los reportes de nivel gerencial y realizar la carga de roles y usuarios.


Descripción de funcionalidades
------------------------------------

El sistema debe proveer como mínimo las siguientes funcionalidades:

+ Controlar la seguridad del sistema.
+ ABM de usuarios, Roles, Logueo, manejo de password y permisos.
+ Administración de la flota de vehículos. ABM, estado, reportes, alarmas, calendario de service, etc.
+ Administración del plantel de empleados (Choferes, Mecánicos, etc.)
+ Administración de Viajes. ABM, vehículo, origen, destino, personal asignado, cliente, tipo de carga, fechas, tiempo estimado de viaje, tiempo real, desviación, kilómetros recorridos previstos, kilómetros recorridos reales, combustible consumido (previsto y real), etc.
+ Mantenimiento de los vehículos. ABM, fecha del service, km de la unidad, costo, service interno/externo, mecánico interviniente, repuestos cambiados, etc.
+ Seguimiento de los vehículos en viaje.
+ Reportes estadísticos del uso de los vehículos, tiempo fuera de servicio, kilómetros recorridos, costo de mantenimiento, costo por kilómetro recorrido, etc.
+ Reporte de desvíos, kilómetros, combustible, tiempos, etc.



La empresa desea asimismo una aplicación móvil/ pagina web móvil, que permita a los celulares que se les entregan a los choferes, a partir de un código leído de un QR enviar un reporte diario de posición a partir del GPS del celular. La empresa requiere que se generer el QR con un código único para cada viaje,
de manera de poder realizar el seguimiento correspondiente. A través de la misma aplicación los
choferes informan cada carga de combustible, lugar donde se realizó, cantidad, importe, km de la
unidad, etc. también accediendo al informe del GPS del Celular.

En un viaje determinado realizado por un vehículo pueden ir uno o más choferes, y el vehículo puede ir
acompañado por un acoplado o no. En caso de llevar un acoplado, se deben registrar para este los
mismos datos que para el vehículo tractor.

De cada vehículo se registra, marca, modelo, patente, nro. de chasis, nro. de motor, año de fabricación,
etc.

De cada empleado se registra, según corresponda, dni, nombre, fecha de nacimiento, tipo de licencia de
conducir, etc.

Todos los listados se requieren por pantalla y en formato PDF.

Se requieren gráficos comparativos del rendimiento de los vehículos a partir de los kilómetros recorridos
entre mantenimientos y del rendimiento promedio de consumo de combustible.


Detalles técnicos:
----------------------

+ Se utilizará una base de datos MySQL para almacenar los datos.
+ El sistema deberá estar implementado con Lenguaje de programación PHP desde el lado del Servidor.
+ La aplicación utilizara tecnologías de orientación a objetos para su implementación.
+ La interface deberá ser implementada en el Framework Bootstrap.
+ Se deberá almacenar el versionado del producto en un repositorio GIT. (https://github.com/ferezecarr/LogisTruck)
+ Las claves de usuario deben almacenarse encriptadas md5 en la base de datos.

Abrir Aplicación:
----------------------

+ En el servidor Apache configurar el proyecto llamado 'pw2' y el DocumentRoot "D:/Xampp/htdocs/pw2"
+ Si el puerto del servidor MySQL no es el predeterminado(3306) modificar el config.php en application/helpers/config/config.php y creando la siguiente clase:
'<?php 

Class Config{

	public static $host = 'localhost';
	public static $user = 'root';
	public static $pass = '';
	public static $db = 'pw2';
}

 ?>'
 + levantar la db que se encuentra en extras/Documentacion/BBDD/ScriptFINAL.sql
