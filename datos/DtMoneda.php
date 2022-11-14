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
                            $mon= new moneda();
                            $mon->__SET('id_moneda', $r->id_moneda);
                            $mon->__SET('nombre', $r->nombre);
                            $mon->__SET('simbolo', $r->simbolo);
                            $mon->__SET('estado', $r->estado);
                           
                            $result[]=$mon;
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