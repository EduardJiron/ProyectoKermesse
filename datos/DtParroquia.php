
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
                    $querysql= "INSERT INTO dbkermesse.tbl_parroquia (nombre, direccion, telefono, parroco, logo ,sitio_web) VALUES (?,?,?,?,?,?)";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute(array(
                            $com->__GET('nombre'),
                            $com->__GET('direccion'),
                            $com->__GET('telefono'),
                            $com->__GET('parroco'),
                            $com->__GET('logo'),
                            $com->__GET('sitio_web'),

                       

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