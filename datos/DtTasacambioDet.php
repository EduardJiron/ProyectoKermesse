<?php


include_once('conexion.php');

class DtTasaCambioDet extends conexion
{

    private $myCon;

    public function listTasaCDET()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tasacambio_det";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $pro= new tasaCambioDet();
                            $pro->__SET('id_tasaCambio_Det', $r->id_tasaCambio_Det);
                            $pro->__SET('id_tasaCambio ', $r->id_tasaCambio);
                            $pro->__SET('fecha ', $r->fecha );
                            $pro->__SET('tipoCambio', $r->tipoCambio);
                        

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