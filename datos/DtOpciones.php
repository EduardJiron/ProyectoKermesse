
<?php


include_once('conexion.php');

class DtOpciones extends conexion
{

    private $myCon;

    public function listOpciones()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_opciones";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $opc= new Opciones();
                            $opc->__SET('id_opciones', $r->id_opciones);
                            $opc->__SET('opcion_descripcion', $r->opcion_descripcion);
                            $opc->__SET('estado', $r->estado);

                            $result[]=$opc;
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