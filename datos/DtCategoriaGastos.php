
<?php


include_once('conexion.php');

class DtCategoriaGastos extends conexion
{

    private $myCon;

    public function listCategoriaGastos()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_categoria_gastos";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $ctgg= new Parroquia();
                            $ctgg->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                            $ctgg->__SET('nombre_categoria', $r->nombre_categoria);
                            $ctgg->__SET('descripcion', $r->descripcion);
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