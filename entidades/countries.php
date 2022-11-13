<?php

class Countries
{
  //Atributos
  private $country_id;
  private $country_name;
  private $region_id;
  
  

  //Metodos
  //Hace get y set para cualquier atributo
  //La flecha permite acceder a la referencia 
  public function _GET($k){return $this->$k; }
  public function _SET($k,$v){return $this->$k = $v; }



}