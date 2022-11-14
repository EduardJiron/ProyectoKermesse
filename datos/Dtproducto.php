
<?php


include_once('conexion.php');

class DtProducto extends conexion
{

    private $myCon;

    public function listProducto()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_usuario";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Producto();
                            $usu->__SET('id_producto', $r->id_producto);
                            $usu->__SET('id_comunidad ', $r->id_comunidad );
                            $usu->__SET('id_cat_producto ', $r->id_cat_producto );
                            $usu->__SET('nombre', $r->nombre);
                            $usu->__SET('descripcion', $r->descripcion);
                            $usu->__SET('cantidad', $r->cantidad);
                            $usu->__SET('preciov_sugerido', $r->preciov_sugerido);
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
