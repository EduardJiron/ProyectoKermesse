<?php
class Ctgproducto{
private $id_categoria_producto;
private $nombre;
private $descripcion;
private $estado;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}
}

?>