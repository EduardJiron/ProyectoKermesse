<?php


include_once('conexion.php');

class DtMoneda extends conexion
{

    private $myCon;

    public function listMoneda()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_moneda";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $mon= new moneda();
                            $mon->__SET('id_moneda', $r->id_moneda);
                            $mon->__SET('nombre', $r->nombre);
                            $mon->__SET('simbolo', $r->simbolo);
                            $mon->__SET('estado', $r->estado);
                           
                            $result[]=$mon;
                    }
                    
                    $this->myCon= parent ::desconectar();
                    return $result;


            }

            catch(Exception $e)
            {
                die($e->getMessage());
            }
    }

    public function insertMoneda(moneda $mn)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_moneda (nombre,simbolo,estado) 
		        VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
                         $mn->__GET('nombre'),
			 $mn->__GET('simbolo'),			
			 $mn->__GET('estado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


        public function getMonedaByID($id)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $querySQL = "SELECT * FROM dbkermesse.tbl_moneda WHERE id_moneda = ?;";
                    $stm = $this->myCon->prepare($querySQL);
                    $stm->execute(array($id));
                    
                    $r = $stm->fetch(PDO::FETCH_OBJ);

                    $u = new moneda();

                    //_SET(CAMPOBD, atributoEntidad)			
                    $u->__SET('id_moneda', $r->id_moneda);
                    $u->__SET('nombre', $r->nombre);
                    $u->__SET('simbolo', $r->simbolo);
                    $u->__SET('estado', $r->estado);                   
                    

                    $this->myCon = parent::desconectar();
                    return $u;
            } 
            catch (Exception $e) 
            {
                    die($e->getMessage());
            }
    }

        public function editMoneda(moneda $mn)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_moneda SET
                                                nombre= ?,
                                                simbolo= ?,                                               
                                                estado= ?
                                    WHERE id_moneda= ?";
    
                                $this->myCon->prepare($sql)
                             ->execute(
                                array(
                                                                               
                                        $mn->__GET('nombre'),
                                        $mn->__GET('simbolo'),
                                        $mn->__GET('estado'),
                                        $mn->__GET('id_moneda')                                               
                                      
                                        
    
    
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


        public function deleteMoneda($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_moneda SET
                                                estado = 3
                                    WHERE id_moneda= ?";

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