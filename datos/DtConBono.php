
<?php


include_once('conexion.php');

class DtConBono extends conexion
{

    private $myCon;

    public function listBono()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_control_bonos";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new conBono();
                            $usu->__SET('id_bono', $r->id_bono);
                            $usu->__SET('nombre', $r->nombre);
                            $usu->__SET('valor', $r->valor);
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