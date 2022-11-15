<?php

class ArqueoCajaDet
{
 
  private $id_Arqueo_Det;
  private $id_ArqueoCaja;
  private $id_Moneda;
  private $id_Denominacion;
  private $cantidad;
  private $subtotal; 

  //Metodos
  //Hace get y set para cualquier atributo
  //La flecha permite acceder a la referencia 
  public function _GET($k){return $this->$k; }
  public function _SET($k,$v){return $this->$k = $v; }



}