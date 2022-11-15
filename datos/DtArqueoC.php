
<?php


include_once('conexion.php');

class DtArqueoC extends conexion
{

    private $myCon;

    public function listArqueoC()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_arqueocaja";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                        $arq= new ArqueoCaja(); 
                        $arq ->_SET('id_ArqueoCaja', $r->id_ArqueoCaja); 
                        $arq ->_SET('id_Kermesse', $r->id_Kermesse);
                        $arq ->_SET('fecha_Arqueo', $r->fecha_Arqueo);    
                        $arq ->_SET('gran_Total', $r->gran_Total);
                        $arq ->_SET('usuario_creacion', $r->usuario_creacion);
                        $arq ->_SET('fecha_creacion', $r->fecha_creacion);
                        $arq ->_SET('usuario_modificacion', $r->usuario_modificacion);
                        $arq ->_SET('usuario_eliminacion', $r->usuario_eliminacion);
                        $arq ->_SET('fecha_eliminacion', $r->fecha_eliminacion);
                        $arq ->_SET('estado', $r->estado);
                        
                            $result[]=$arq;
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