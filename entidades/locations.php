<?php

class Locations
{
  //Atributos
  private $location_id;
  private $street_address;
  private $postal_code;
  private $city;
  private $state_province;
  private $country_id; 

  //Metodos
  //Hace get y set para cualquier atributo
  //La flecha permite acceder a la referencia 
  public function _GET($k){return $this->$k; }
  public function _SET($k,$v){return $this->$k = $v; }



}