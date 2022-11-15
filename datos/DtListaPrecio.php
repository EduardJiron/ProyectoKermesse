
<?php


include_once('conexion.php');

class DtListaPrecio extends conexion
{

    private $myCon;

    public function listListaPrecio()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_lista_precio";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $par= new lista_precio();
                            $par->__SET('id_lista_precio', $r->id_lista_precio);
                            $par->__SET('id_kermesse', $r->id_kermesse);
                            $par->__SET('nombre', $r->nombre);
                            $par->__SET('descripcion', $r->descripcion);
                            $par->__SET('estado', $r->estado);

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