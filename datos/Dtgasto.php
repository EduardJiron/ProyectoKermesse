
<?php


include_once('conexion.php');

class Dtgasto extends conexion
{

    private $myCon;

    public function listGasto()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_gastos";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $com= new Comunidad();
                            $com->__SET('id_registro_gastos', $r->id_registro_gastos);
                            $com->__SET('idKermesse', $r->idKermesse);
                            $com->__SET('idCatGastos', $r->idCatGastos);
                            $com->__SET('fechaGasto', $r->fechaGasto);
                            $com->__SET('concepto', $r->concepto);    
                            $com->__SET('monto', $r->monto);
                            $com->__SET('usuario_creacion', $r->usuario_creacion);
                            $com->__SET('fecha_creacion', $r->fecha_creacion);
                            $com->__SET('usuario_modificacion', $r->usuario_modificacion);
                            $com->__SET('fecha_modificacion', $r->usuario_creacion);
                            $com->__SET('usuario_eliminacion', $r->usuario_eliminacion);   
                            $com->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                            $com->__SET('estado', $r->estado);                         
                                                    
                        

                            $result[]=$com;
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