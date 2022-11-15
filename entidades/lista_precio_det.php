<?php
class lista_precio_det{
private $id_listaprecio_det; 
private $id_lista_precio;
private $id_producto;
private $precio_venta;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}
}

?>