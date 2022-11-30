
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
                            $par= new conBono();
                            $par->__SET('id_bono', $r->id_bono);
                            $par->__SET('nombre', $r->nombre);
                            $par->__SET('valor', $r->valor);
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
    public function getcomrByID($id)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos WHERE id_bono = ?;";
                    $stm = $this->myCon->prepare($querySQL);
                    $stm->execute(array($id));
                    
                    $r = $stm->fetch(PDO::FETCH_OBJ);

                    $u = new conBono();

                    //_SET(CAMPOBD, atributoEntidad)			
                    $u->__SET('id_bono', $r->id_bono);
                    $u->__SET('nombre', $r->nombre);
                    $u->__SET('valor', $r->valor);
                    $u->__SET('estado', $r->estado);
                

                    $this->myCon = parent::desconectar();
                    return $u;
            } 
            catch (Exception $e) 
            {
                    die($e->getMessage());
            }
    }

    
    public function editBonos( conBono $tu)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $sql = "UPDATE dbkermesse.tbl_control_bonos SET
                                           
                                            nombre= ?,
                                            valor= ?,
                                            estado= ?
                                          
                                WHERE id_bono= ?";

                            $this->myCon->prepare($sql)
                         ->execute(
                            array(
                                    //$tu->__GET('usuario'), 
                                    
                                    $tu->__GET('nombre'),
                                    $tu->__GET('valor'),
                                    $tu->__GET('estado'),
                                    $tu ->__GET('id_bono')


                                    )
                            );
                            $this->myCon = parent::desconectar();
            } 
            catch (Exception $e) 
            {
                    var_dump($e);
                    die($e->getMessage());
            }
    }

    public function deleBono($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_control_bonos SET
                                                estado = 3
                                    WHERE id_bono= ?";
    
                        $stm = $this->myCon->prepare($sql);
                        $stm->execute(array($id)
                    );
    
                        $this->myCon = parent::desconectar();
                } 
                catch (Exception $e) 
                {
                        var_dump($e);
                        die($e->getMessage());
                }
        }


}



?>