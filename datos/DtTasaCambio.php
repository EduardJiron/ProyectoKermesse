<?php


include_once('conexion.php');

class DtTasaCambio extends conexion
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
                            $pro= new tasaCambios();
                            $pro->__SET('id_tasaCambio', $r->id_tasaCambio);
                            $pro->__SET('id_monedaO ', $r->id_monedaO );
                            $pro->__SET('id_monedaC ', $r->id_monedaC );
                            $pro->__SET('mes', $r->mes);
                            $pro->__SET('anio', $r->anio);
                            $pro->__SET('estado', $r->estado);


                            $result[]=$pro;
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