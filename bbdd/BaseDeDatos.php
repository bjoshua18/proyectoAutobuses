<?php

class BaseDeDatos {
	protected $servidor;
	protected $usuario;
	protected $password;
	protected $db;
	protected $puerto;
	public $tipo;

	public function __construct($servidor, $usuario, $password, $db, $puerto, $tipo) {
		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->db = $db;
		$this->puerto = $puerto;
		$this->tipo = $tipo;
	}

	public function verConfiguracion() {
		echo "{$this->servidor}:{$this->puerto}<br/>
					{$this->usuario}<br/>
					{$this->db}<br/>
					{$this->tipo}<br/>";
	}
}