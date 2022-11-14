
<?php


include_once('conexion.php');

class DtRolUsuario extends conexion
{

    private $myCon;

    public function listRolUsuario()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_rol_usuario";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new usuario();
                            $usu->__SET('id_rol_usuario', $r->id_rol_usuario);
                            $usu->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                            $usu->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
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