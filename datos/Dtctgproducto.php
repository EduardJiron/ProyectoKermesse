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
                            $ctg= new Ctgproducto();
                            $ctg->__SET('id_categoria_producto', $r->id_categoria_producto);
                            $ctg->__SET('nombre', $r->nombre);
                            $ctg->__SET('descripcion', $r->descripcion);
                            $ctg->__SET('estado', $r->estado);
                           
                            $result[]=$ctg;
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