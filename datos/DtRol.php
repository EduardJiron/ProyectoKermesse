<?php


include_once('conexion.php');

class DtRol extends conexion
{

    private $myCon;

    public function listRol()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_rol";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Rol();
                            $usu->__SET('id_rol', $r->id_rol);
                            $usu->__SET('rol_descripcion', $r->rol_descripcion);                            
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