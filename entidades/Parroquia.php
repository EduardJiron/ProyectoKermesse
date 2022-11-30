<?php
class Parroquia{
private $idParroquia; 
private $nombre;
private $direccion;
private $telefono;
private $parroco;
private $logo;
private $sitio_web;
private $estado;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}
}

?>