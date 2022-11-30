
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
                            $ctgg= new CategoriaGastos();
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

    public function insertCategoriaGastos(CategoriaGastos $cg)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_categoria_gastos (nombre_categoria, descripcion, estado) 
		        VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
                         $cg->__GET('nombre_categoria'),
			 $cg->__GET('descripcion'),			
			 $cg->__GET('estado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


        public function getCategoriaGastosByID($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos WHERE id_categoria_gastos = ?;";
                        $stm = $this->myCon->prepare($querySQL);
                        $stm->execute(array($id));
                        
                        $r = $stm->fetch(PDO::FETCH_OBJ);
    
                        $u = new CategoriaGastos();
    
                        //_SET(CAMPOBD, atributoEntidad)			
                        $u->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                        $u->__SET('nombre_categoria', $r->nombre_categoria);
                        $u->__SET('descripcion', $r->descripcion);
                        $u->__SET('estado', $r->estado);                   
                        
    
                        $this->myCon = parent::desconectar();
                        return $u;
                } 
                catch (Exception $e) 
                {
                        die($e->getMessage());
                }
        }
    
            public function editCategoriaGastos(CategoriaGastos $cg)
            {
                    try 
                    {
                            $this->myCon = parent::conectar();
                            $sql = "UPDATE dbkermesse.tbl_categoria_gastos SET
                                                    nombre_categoria= ?,
                                                    descripcion= ?,                                               
                                                    estado= ?
                                        WHERE id_categoria_gastos= ?";
        
                                    $this->myCon->prepare($sql)
                                 ->execute(
                                    array(
                                            $cg->__GET('nombre_categoria'),
                                            $cg->__GET('descripcion'),
                                            $cg->__GET('estado'),
                                            $cg->__GET('id_categoria_gastos')
        
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


            public function deleteCategoriaGastos($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_categoria_gastos SET
                                                estado = 3
                                    WHERE id_categoria_gastos= ?";

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