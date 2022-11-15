<?php

class IngresoComunidadDet{

private $id_ingreso_comunidad_det;
private $id_comunidad;
private $id_bono;
private $denominacion;
private $cantidad;
private $subtotal_bono;


public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}

}   

?>