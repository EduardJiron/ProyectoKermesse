<?php


include_once('conexion.php');

class DtTasaCambios extends conexion
{

    private $myCon;

    public function listTasaC()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_tasacambio";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $cat= new tasaCambios();
                            $cat->__SET('id_tasaCambio', $r->id_tasaCambio);
                            $cat->__SET('id_monedaO ', $r->id_monedaO );
                            $cat->__SET('id_monedaC ', $r->id_monedaC );
                            $cat->__SET('mes', $r->mes);
                            $cat->__SET('anio', $r->anio);
                            $cat->__SET('estado', $r->estado);


                            $result[]=$cat;
                    }
                    
                    $this->myCon= parent ::desconectar();
                    return $result;


            }

            catch(Exception $e)
            {
                die($e->getMessage());
            }
    }



}



?>