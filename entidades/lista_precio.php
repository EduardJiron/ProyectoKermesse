<?php
class lista_precio{
private $id_lista_precio; 
private $id_kermesse;
private $nombre;
private $descripcion;
private $estado;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}
}

?>