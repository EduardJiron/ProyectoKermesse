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
                            $det= new tasaCambioDet();
                            $det->__SET('id_tasaCambio_Det', $r->id_tasaCambio_Det);
                            $det->__SET('id_tasaCambio ', $r->id_tasaCambio);
                            $det->__SET('fecha ', $r->fecha );
                            $det->__SET('tipoCambio', $r->tipoCambio);
                        

                            $result[]=$det;
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