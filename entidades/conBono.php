<?php
class conBono{
private $id_bono;
private $nombe;
private $valor;
private $estado;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}

}
?>