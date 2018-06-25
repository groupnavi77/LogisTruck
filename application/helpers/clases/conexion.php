
<?php

	require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
	require_once $CONFIG_DIR;

	class Conexion extends mysqli{

		public function __construct(){

			parent::__construct(Config::$host , Config::$user , Config::$pass , Config::$db);

			if($this->connect_errno){

				die('Error en la conexion a la base de datos');
			}
		}

		public function validarCampo($tabla , $columna , $valor){

			$query = "SELECT * FROM '$tabla' WHERE '$columna' = '$valor'";
			$sql = $this->query($query);
			$filas = $sql->num_rows();
			return $filas;
		}

		public function getUsuario($tabla , $columna , $valor){

			$query = "SELECT 'usuario' FROM '$tabla' WHERE '$columna' = '$valor'";
			$sql = $this->query(query);
			$usuario = $sql->fetch_assoc()["usuario"];
			return $usuario;
		}

		/*public function validarLogin($user,$password){
		$query = "SELECT login.usuario, login.pass, empleado.idRol FROM login INNER JOIN empleado ON login.idEmpleado = empleado.idEmpleado WHERE login.usuario = ? AND login.pass = ? ";

		$statement = $conexion->prepare($query);
		$statement->bind_param('ss',$user,$password);
		$statement->execute();
		$resultado = $statement->get_result();
		$row=mysqli_fetch_row($resultado);

		if ($resultado->num_rows = 0){
				die('Error el usuario o contraseña no existe');
			}
		else{
			return $resultado;
		}*/
	}
 ?>




	<!-- //require("../config\config.php");//llama al archivo que contiene los parametros para conectarse
	//echo "hola soy conexion";
	//class Conexion extends mysqli{//clase conexion que extiende de PDO

		/*private $tipoBBDD = 'mysql';
		private $host = 'localhost';
		private $nombreBBDD = 'pw2';
		private $usuario = 'root';
		private $contraseña = '';

		//protected $conexion_db;//aca se guardara la conexion


		public function __construct(){

			try{

				parent::__construct($this->tipoBBDD. ':host=' .$this->host. ';dbname=' .$this->nombreBBDD, $this->usuario, $this->contraseña);
			} catch(PDOException $e){

				echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
				exit();
			}


		}*/


		/* function __construct(){//constructor de la clase

			$this->conexion_db=new mysqli(DB_HOST,DB_USUARIO,DB_PASS,DB_NOMBRE);//se establece conexion.
			if($this->conexion_db->connect_errno){//condicieonal por si falla la conexion

				"error al conectar a la BBDD: " .  $this->conexion_db->connect_error;

				return;

			}

			$this->conexion_db->set_charset(DB_CHARSET); //para que soporte caracteres latinos


		}*/


	//}

	/*class Consulta extends PDO{//clase consulta que extiende de PDO


		function __construct(){//constructor de la clase Consulta

			parent::__construct();//llama al constructor de la clase padre (clase Conexion)


		}

		public function getRegistros($sql){ //metodo que hace la consulta y devuelve resultado. Se le debe pasar la consulta por parametro "($sql)".

			$resultado=$this->conexion_db->query($sql);//guarda registros en "$resultado"


			return $resultado;

			/*$resultado=$this->conexion_db->query('select * from usuarios');
			$registros=$resultado->fetch_all(MYSQLI_ASSOC);
			======================================================================*/

		/*}


		public function insertRegistros($insert){ //metodo que hace la consulta y devuelve resultado. Se le debe pasar la consulta por parametro "($sql)".

			$resultadoINS=$this->conexion_db->query($insert);//guarda registros en "$resultado"
			//return $resultado;


		}



	}*/ -->
