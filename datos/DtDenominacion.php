<?php


include_once('conexion.php');

class DtDenominacion extends conexion
{

    private $myCon;

    public function listDenominacion()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_denominacion";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $den= new Denominacion();
                            $den->__SET('id_Denominacion', $r->id_Denominacion);
                            $den->__SET('valor', $r->valor);   
                            $den->__SET('valor_letras', $r->valor_letras);   
                            $den->__SET('estado', $r->estado);                            

                            $result[]=$den;
                    }
                    
                    $this->myCon= parent ::desconectar();
                    return $result;


            }

            catch(Exception $e)
            {
                die($e->getMessage());
            }
    }

    public function insertDenominacion(Denominacion $dt)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_denominacion (valor,valor_letras,estado) 
		        VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $dt->__GET('valor'),
			 $dt->__GET('valor_letras'),			
			 $dt->__GET('estado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



}



?>