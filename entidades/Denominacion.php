<?php

class Denominacion{

private $id_Denominacion;
private $id_Moneda;
private $valor;
private $valor_letras;
private $estado = 1;


public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}

}   

?>