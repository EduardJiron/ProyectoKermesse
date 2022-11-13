<?php

class Regions
{
  //Atributos
  private $region_id;
  private $region_name;

  //Metodos
  public function _GET($k){return $this->$k; }
  public function _SET($k,$v){return $this->$k = $v; }



}