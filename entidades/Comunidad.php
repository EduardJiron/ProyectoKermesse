<?php

class Comunidad{

private $id_comunidad;
private $nombre;
private $responsable;
private $desc_contribucion;
private $estado;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}

}   
?>
