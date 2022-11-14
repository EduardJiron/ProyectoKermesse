
<?php


include_once('conexion.php');

class DtComunidad extends conexion
{

    private $myCon;

    public function listComunidad()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_comunidad";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Comunidad();
                            $usu->__SET('id_comunidad', $r->id_comunidad);
                            $usu->__SET('nombre', $r->nombre);
                            $usu->__SET('responsable', $r->responsable);
                            $usu->__SET('desc_contribucion', $r->desc_contribucion);
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