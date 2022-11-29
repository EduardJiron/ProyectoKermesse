
<?php


include_once('conexion.php');

class DtConBono extends conexion
{

    private $myCon;

    public function listBono()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_control_bonos";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $bon= new conBono();
                            $bon->__SET('id_bono', $r->id_bono);
                            $bon->__SET('nombre', $r->nombre);
                            $bon->__SET('valor', $r->valor);
                            $bon->__SET('estado', $r->estado);
                    

                            $result[]=$bon;
                    }
                    
                    $this->myCon= parent ::desconectar();
                    return $result;


            }

            catch(Exception $e)
            {
                die($e->getMessage());
            }
    }

    public function insertBono(conBono $com)
    {
            try
            {
                    $this->myCon= parent ::conectar();
                    $querysql= "INSERT INTO  dbkermesse.tbl_control_bonos (nombre, valor, estado) VALUES (?,?,?)";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute(array(
                            $com->__GET('nombre'),
                            $com->__GET('valor'),
                            $com->__GET('estado'),

                    ));

                    $this->myCon= parent ::desconectar();
            }
            catch(Exception $e)
            {
                    die($e->getMessage());
            }
    }


}



?>