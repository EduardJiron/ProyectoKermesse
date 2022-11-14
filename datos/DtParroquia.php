
<?php


include_once('conexion.php');

class DtParroquia extends conexion
{

    private $myCon;

    public function listParroquia()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_parroquia";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Parroquia();
                            $usu->__SET('idParroquia', $r->idParroquia);
                            $usu->__SET('nombre', $r->nombre);
                            $usu->__SET('direccion', $r->direccion);
                            $usu->__SET('telefono', $r->telefono);
                            $usu->__SET('parroco', $r->parroco);
                            $usu->__SET('logo', $r->logo);
                            $usu->__SET('sitio_web', $r->sitio_web);

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