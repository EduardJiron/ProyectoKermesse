<?php


include_once('conexion.php');

class DtRolUsuario extends conexion
{

    private $myCon;

    public function listRolUsua()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM rol_usuario";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $rou= new moneda();
                            $rou->__SET('id_rol_usuario', $r->id_rol_usuarioa);
                            $rou->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                            $rou->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
            
                           
                            $result[]=$rou;
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