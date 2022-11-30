
<?php


include_once('conexion.php');

class DtParroquia extends conexion
{

    private $myCon;

    public function listParroquia()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_parroquia";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $par= new Parroquia();
                            $par->__SET('idParroquia', $r->idParroquia);
                            $par->__SET('nombre', $r->nombre);
                            $par->__SET('direccion', $r->direccion);
                            $par->__SET('telefono', $r->telefono);
                            $par->__SET('parroco', $r->parroco);
                            $par->__SET('logo', $r->logo);
                            $par->__SET('sitio_web', $r->sitio_web);
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

    public function insertparro(Parroquia $com)
    {
            try
            {
                    $this->myCon= parent ::conectar();
                    $querysql= "INSERT INTO dbkermesse.tbl_parroquia (nombre, direccion, telefono, parroco, logo ,sitio_web, estado) VALUES (?,?,?,?,?,?,?)";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute(array(
                            $com->__GET('nombre'),
                            $com->__GET('direccion'),
                            $com->__GET('telefono'),
                            $com->__GET('parroco'),
                            $com->__GET('logo'),
                            $com->__GET('sitio_web'),
                            $com->__GET('estado')
                           

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
                    $querySQL = "SELECT * FROM dbkermesse.tbl_parroquia WHERE idparroquia = ?;";
                    $stm = $this->myCon->prepare($querySQL);
                    $stm->execute(array($id));
                    
                    $r = $stm->fetch(PDO::FETCH_OBJ);

                    $u = new Parroquia();

                    //_SET(CAMPOBD, atributoEntidad)			
                    $u->__SET('idParroquia', $r->idParroquia);
                    $u->__SET('nombre', $r->nombre);
                    $u->__SET('direccion', $r->direccion);
                    $u->__SET('telefono', $r->telefono);
                    $u->__SET('parroco', $r->parroco);
                    $u->__SET('logo', $r->logo);
                    $u->__SET('sitio_web', $r->sitio_web);
                    $u->__SET('estado', $r->estado);
                    

                    $this->myCon = parent::desconectar();
                    return $u;
            } 
            catch (Exception $e) 
            {
                    die($e->getMessage());
            }
    }

    
    public function editparroq( Parroquia $tu)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $sql = "UPDATE dbkermesse.tbl_parroquia SET
                                           
                                            nombre= ?,
                                            direccion= ?,
                                            telefono= ?,
                                            parroco= ?,
                                            logo= ?,
                                            sitio_web= ?,
                                            estado=?
                                WHERE idParroquia= ?";

                            $this->myCon->prepare($sql)
                         ->execute(
                            array(
                                    //$tu->__GET('usuario'), 
                                    
                                    $tu->__GET('nombre'),
                                    $tu->__GET('direccion'),
                                    $tu->__GET('telefono'),
                                    $tu->__GET('parroco'),
                                    $tu->__GET('logo'),
                                    $tu->__GET('sitio_web'),
                                    $tu->__GET('estado'),
                                    $tu ->__GET('idParroquia')


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

    public function deletparro($id)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $sql = "UPDATE dbkermesse.tbl_parroquia SET
                                            estado = 3
                                WHERE idParroquia= ?";

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