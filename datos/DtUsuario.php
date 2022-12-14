
<?php


include_once('conexion.php');

class DtUsuario extends conexion
{

    private $myCon;

    public function listUsuario()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_usuario";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Usuario();
                            $usu->__SET('id_usuario', $r->id_usuario);
                            $usu->__SET('usuario', $r->usuario);
                            $usu->__SET('nombres', $r->nombres);
                            $usu->__SET('apellidos', $r->apellidos);
                            $usu->__SET('email', $r->email);
                            $usu->__SET('pwd', $r->pwd);
                                $usu->__SET('estado', $r->estado);
                            

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
    public function insertuser(Usuario $com)
    {
            try
            {
                    $this->myCon= parent ::conectar();
                    $querysql= "INSERT INTO dbkermesse.tbl_usuario (usuario,pwd, nombres, apellidos,email,estado) VALUES (?,?,?,?,?,?)";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute(array(
                                $com->__GET('usuario'),
                                $com->__GET('pwd'),
                                $com->__GET('nombres'),
                                $com->__GET('apellidos'),
                                $com->__GET('email'),
                                $com->__GET('estado')


                    ));

                    $this->myCon= parent ::desconectar();
            }
            catch(Exception $e)
            {
                    die($e->getMessage());
            }
    }
    public function getUserByID($id)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE id_usuario = ?;";
                    $stm = $this->myCon->prepare($querySQL);
                    $stm->execute(array($id));
                    
                    $r = $stm->fetch(PDO::FETCH_OBJ);

                    $u = new Usuario();

                    //_SET(CAMPOBD, atributoEntidad)			
                    $u->__SET('id_usuario', $r->id_usuario);
                    $u->__SET('usuario', $r->usuario);
                    $u->__SET('nombres', $r->nombres);
                    $u->__SET('apellidos', $r->apellidos);
                    $u->__SET('email', $r->email);

                    $this->myCon = parent::desconectar();
                    return $u;
            } 
            catch (Exception $e) 
            {
                    die($e->getMessage());
            }
    }
    public function editUser(Usuario $tu)
    {
            try 
            {
                    $this->myCon = parent::conectar();
                    $sql = "UPDATE dbkermesse.tbl_usuario SET
                                            pwd = ?,
                                            nombres = ?, 
                                            apellidos = ?, 
                                                email = ?,
                                            estado = ?,
                                            usuario = ?
                                WHERE id_usuario = ?";

                            $this->myCon->prepare($sql)
                         ->execute(
                            array(
                                    //$tu->__GET('usuario'), 
                                    $tu->__GET('pwd'), 
                                    
                                    $tu->__GET('nombres'),
                                    $tu->__GET('apellidos'),
                                        $tu->__GET('email'),
                                    $tu->__GET('estado'),
                                        $tu->__GET('usuario'),
                                    $tu->__GET('id_usuario')
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

    public function validarUser($user, $pwd)
	{
		try
		{
			$this->myCon = parent::conectar();
			
			$querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE usuario=? AND pwd=? AND estado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($user, $pwd));
			
			$resultado = $stm->fetchAll(PDO::FETCH_CLASS, "Usuario");
			
			$this->myCon = parent::desconectar();
			return $resultado;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

        public function deleteuser($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_usuario SET
                                                estado = 3
                                    WHERE id_usuario= ?";
    
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
