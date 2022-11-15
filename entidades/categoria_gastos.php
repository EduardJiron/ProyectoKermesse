<?php


class CategoriaGastos{
private $id_categoria_gastos;
private $nombre_categoria;
private $descripcion;
private $estado;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}
}

?>