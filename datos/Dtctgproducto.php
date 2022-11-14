<?php


include_once('conexion.php');

class Dtctgproducto extends conexion
{

    private $myCon;

    public function listctgproducto()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_categoria_producto";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Ctgproducto();
                            $usu->__SET('id_categoria_producto', $r->id_categoria_producto);
                            $usu->__SET('nombre', $r->nombre);
                            $usu->__SET('descripcion', $r->descripcion);
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