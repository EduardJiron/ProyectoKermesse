
<?php


include_once('conexion.php');

class DtArqueoCajaDet extends conexion
{

    private $myCon;

    public function listArqueoCajaDet()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_idarqueocaja";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $ctgg= new Parroquia();
                            $ctgg->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                            $ctgg->__SET('idKermesse', $r->idKermesse);
                            $ctgg->__SET('fechaArqueo', $r->fechaArqueo);
                            $ctgg->__SET('granTotal', $r->granTotal);
                            $ctgg->__SET('usuario_creacion', $r->usuario_creacion);
                            $ctgg->__SET('fecha_creacion', $r->fecha_creacion);
                            $ctgg->__SET('usuario_modificacion', $r->usuario_modificacion);
                            $ctgg->__SET('fecha_modificacion', $r->fecha_modificacion);
                            $ctgg->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                            $ctgg->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                            $ctgg->__SET('estado', $r->estado);





                            $result[]=$ctgg;
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