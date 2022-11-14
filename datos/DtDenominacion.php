<?php


include_once('conexion.php');

class DtDenominacion extends conexion
{

    private $myCon;

    public function listDenominacion()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_denominacion";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $den= new Denominacion();
                            $den->__SET('id_Denominacion', $r->id_Denominacion);
                            $den->__SET('valor', $r->valor);   
                            $den->__SET('valor_letras', $r->valor_letras);   
                            $den->__SET('estado', $r->estado);                            

                            $result[]=$den;
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