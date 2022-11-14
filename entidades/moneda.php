<?php
class moneda{
private $id_moneda;
private $nombre;
private $simbolo;
private $estado=1;

public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}
}

?>