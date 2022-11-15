
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
                    $querysql= "SELECT * FROM tbl_arqueocaja_det";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                        $arq= new ArqueoCajaDet(); 
                        $arq ->_SET('id_Arqueo_Det', $r->id_Arqueo_Det); 
                        $arq ->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                        $arq ->_SET('id_Moneda', $r->id_Moneda);    
                        $arq ->_SET('id_Denominacion', $r->id_Denominacion);
                        $arq ->_SET('cantidad', $r->cantidad);
                        $arq ->_SET('subtotal', $r->subtotal);





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