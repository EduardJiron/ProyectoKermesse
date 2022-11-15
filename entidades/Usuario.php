<?php

class Usuario{

private $id_usuario;
private $usuario;
private $nombres;
private $apellidos;
private $email;
private $pwd;
private $estado=1;


public function __GET($k){return $this->$k;}
public function __SET($k, $v){return $this->$k = $v;}



}   

?>




    


