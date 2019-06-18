<?php

class DBMySql extends BaseDeDatos {
	protected $conexion;

	public function __construct($servidor, $usuario, $password, $db, $puerto=3306, $tipo) {
		parent::__construct($servidor, $usuario, $password, $db, $puerto, 'mysql');
		$this->conexion = mysqli_connect("{$this->servidor}:{$this->puerto}", $this->usuario, $this->password, $this->db);
		mysqli_select_db($this->conexion, $this->db);
	}

	public function setQuery($query) {
		//$query = mysqli::real_escape_string($query);
		return $this->idConsulta = mysqli_query($this->conexion, $query);
	}

	public function queryToArray() {
		$array = [];
		for ($i=1; $i <= $this->idConsulta->num_rows; $i++) 
			array_push($array, mysqli_fetch_assoc($this->idConsulta));
		
		return $array;
	}

	public function __destruct() {
		mysqli_close($this->conexion);
	}

	public function consulta($consulta) {
		$this->conexion;
		$this->setQuery($consulta);
	}
}