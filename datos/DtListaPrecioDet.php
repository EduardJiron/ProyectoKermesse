
<?php


include_once('conexion.php');

class DtListaPrecioDet extends conexion
{

    private $myCon;

    public function listListaPrecioDet()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_lista_precio";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $par= new Parroquia();
                            $par->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                            $par->__SET('id_lista_precio', $r->id_lista_precio);
                            $par->__SET('id_producto', $r->id_producto);
                            $par->__SET('precio_venta', $r->precio_venta);

                            $result[]=$par;
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