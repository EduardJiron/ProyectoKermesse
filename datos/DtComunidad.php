
<?php


include_once('conexion.php');

class DtComunidad extends conexion
{

    private $myCon;

    public function listComunidad()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_comunidad";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $com= new Comunidad();
                            $com->__SET('id_comunidad', $r->id_comunidad);
                            $com->__SET('nombre', $r->nombre);
                            $com->__SET('responsable', $r->responsable);
                            $com->__SET('desc_contribucion', $r->desc_contribucion);
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


    public function insertcomu(Comunidad $com)
    {
            try
            {
                    $this->myCon= parent ::conectar();
                    $querysql= "INSERT INTO dbkermesse.tbl_comunidad (nombre, responsable, desc_contribucion, estado) VALUES (?,?,?,?)";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute(array(
                            $com->__GET('nombre'),
                            $com->__GET('responsable'),
                            $com->__GET('desc_contribucion'),
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