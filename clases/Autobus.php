<?php

class Autobus {
	private $nombre;
	private $color;
	private $capacidad;

	public function __construct($nombre, $color, $capacidad) {
		$this->nombre = $nombre;
		$this->color = $color;
		$this->capacidad = $capacidad;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getColor(){
		return $this->color;
	}

	public function setColor($color){
		$this->color = $color;
	}

	public function getCapacidad(){
		return $this->capacidad;
	}

	public function setCapacidad($capacidad){
		$this->capacidad = $capacidad;
	}

	public function toString() {
		return "
			Nombre: $this->nombre<br/>
			Color: $this->color<br/>
			Capacidad: $this->capacidad<br/>
		";
	}
}