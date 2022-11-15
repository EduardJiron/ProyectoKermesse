<?php


include_once('conexion.php');

class DtIngresoComunidadDet extends conexion
{

    private $myCon;

    public function listIngresoComunidadDet()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_ingreso_comunidad_det";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new IngresoComunidadDet();
                            $usu->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad);
                            $usu->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);   
                            $usu->__SET('id_bono', $r->id_bono); 
                            $usu->__SET('denominacion', $r->denominacion); 
                            $usu->__SET('cantidad', $r->cantidad); 
                            $usu->__SET('subtotal_bono', $r->subtotal_bono); 
                           
                                                     

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