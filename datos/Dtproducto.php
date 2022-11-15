
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
                    $querysql= "SELECT * FROM tbl_productos";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $pro= new Producto();
                            $pro->__SET('id_producto', $r->id_producto);
                            $pro->__SET('id_comunidad ', $r->id_comunidad );
                            $pro->__SET('id_cat_producto ', $r->id_cat_producto );
                            $pro->__SET('nombre', $r->nombre);
                            $pro->__SET('descripcion', $r->descripcion);
                            $pro->__SET('cantidad', $r->cantidad);
                            $pro->__SET('preciov_sugerido', $r->preciov_sugerido);
                            $pro->__SET('estado', $r->estado);
                            

                            $result[]=$pro;
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
