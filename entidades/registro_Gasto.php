<?php

class Registro
{
  //Atributos
  private $id_registro;
  private $id_kermesse;
  private $idCatGastos;
  private $fechaGasto;
  private $concepto;
  private $monto; 
  private $usuario_creacion;
  private $fecha_creacion;
  private $usuario_modificacion;
  private $fecha_modificacion;
  private $usuario_eliminacion;
  private $fecha_eliminacion;
  private $estado;

  //Metodos
  //Hace get y set para cualquier atributo
  //La flecha permite acceder a la referencia 
  public function _GET($k){return $this->$k; }
  public function _SET($k,$v){return $this->$k = $v; }



}