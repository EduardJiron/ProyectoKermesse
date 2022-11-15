<?php


include_once('conexion.php');

class DtIngresoComunidad extends conexion
{

    private $myCon;

    public function listIngresoComunidad()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_ingreso_comunidad";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new IngresoComunidad();
                            $usu->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                            $usu->__SET('id_kermesse', $r->id_kermesse);   
                            $usu->__SET('id_comunidad', $r->id_comunidad); 
                            $usu->__SET('id_producto', $r->id_producto); 
                            $usu->__SET('cant_productos', $r->cant_productos); 
                            $usu->__SET('total_bonos', $r->total_bonos); 
                            $usu->__SET('estado', $r->estado);   
                            $usu->__SET('usuario_creacion', $r->usuario_creacion); 
                            $usu->__SET('fecha_creacion', $r->fecha_creacion); 
                            $usu->__SET('usuario_modificacion', $r->usuario_modificacion); 
                            $usu->__SET('fecha_modificacion', $r->fecha_modificacion); 
                            $usu->__SET('usuario_eliminacion', $r->usuario_eliminacion); 
                            $usu->__SET('fecha_eliminacion', $r->fecha_eliminacion);   
                                                     

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