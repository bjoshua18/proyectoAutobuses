<?php

class Validacion {
	private $error;

	// Validación de textos
	public function validaTexto($text, $min=false, $max=false, $espacio=true, $mensaje='') {
		if(!empty($min))
			if(strlen($text) < $min) {
				$this->error = $mensaje;
				return $this->error;
			}

		if(!empty($max))
			if(strlen($text) > $max) {
				$this->error = $mensaje;
				return $this->error;
			}

		if($espacio)
			$res = preg_match("/^[A-Za-z0-9\ ]+$/", $text);
		else
			$res = preg_match("/^[A-Za-z0-9]+$/", $text);

		return $res === 1 ? true : $mensaje;
	}
}