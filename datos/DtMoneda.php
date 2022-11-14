<?php


include_once('conexion.php');

class DtMoneda extends conexion
{

    private $myCon;

    public function listMoneda()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_moneda";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new moneda();
                            $usu->__SET('id_moneda', $r->id_moneda);
                            $usu->__SET('nombre', $r->nombre);
                            $usu->__SET('simbolo', $r->simbolo);
                            $usu->__SET('estado', $r->estado);
                           
                            $result[]=$usu;
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