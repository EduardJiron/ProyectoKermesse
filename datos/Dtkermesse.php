
<?php


include_once('conexion.php');

class Dtkermesse extends conexion
{

    private $myCon;

    public function listkermesse()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_kermesse";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $ker= new Kermesse();
                            $ker->__SET('id_kermesse', $r->id_kermesse);
                            $ker->__SET('idParroquia ', $r->idParroquia );
                            $ker->__SET('id_cat_producto ', $r->id_cat_producto );
                            $ker->__SET('nombre', $r->nombre);
                            $ker->__SET('fInicio', $r->fInicio);
                            $ker->__SET('fFinal', $r->fFinal);
                            $ker->__SET('descripcion', $r->descripcion);
                            $ker->__SET('estado', $r->estado);
                            $ker->__SET('id_cat_producto ', $r->id_cat_producto );
                            $ker->__SET('usuario_creacion', $r->usuario_creacion );
                            $ker->__SET('fecha_creacion', $r->fecha_creacion);
                            $ker->__SET('usuario_modificacion', $r->usuario_modificacion);
                            $ker->__SET('fecha_modificacion', $r->fecha_modificacion);
                            $ker->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                            $ker->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                            

                            $result[]=$ker;
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
