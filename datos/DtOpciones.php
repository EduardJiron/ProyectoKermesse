
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
                            $usu= new Parroquia();
                            $usu->__SET('id_opciones', $r->id_opciones);
                            $usu->__SET('opcion_descripcion', $r->opcion_descripcion);
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