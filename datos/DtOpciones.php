
<?php


include_once('conexion.php');

class DtOpciones extends conexion
{

        private $myCon;

        public function listOpciones()
        {
                try {

                        $this->myCon = parent::conectar();
                        $result = array();
                        $querysql = "SELECT * FROM tbl_opciones";

                        $stm = $this->myCon->prepare($querysql);
                        $stm->execute();

                        foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                                $opc = new Opciones();
                                $opc->__SET('id_opciones', $r->id_opciones);
                                $opc->__SET('opcion_descripcion', $r->opcion_descripcion);
                                $opc->__SET('estado', $r->estado);

                                $result[] = $opc;
                        }

                        $this->myCon = parent::desconectar();
                        return $result;
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }

        public function insertopciones(Opciones $com)
        {
                try {
                        $this->myCon = parent::conectar();
                        $querysql = "INSERT INTO dbkermesse.tbl_opciones (opcion_descripcion, estado) VALUES (?,?)";

                        $stm = $this->myCon->prepare($querysql);
                        $stm->execute(array(
                                $com->__GET('opcion_descripcion'),
                                $com->__GET('estado'),


                        ));

                        $this->myCon = parent::desconectar();
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }

        public function getcomrByID($id)
        {
                try {
                        $this->myCon = parent::conectar();
                        $querySQL = "SELECT * FROM dbkermesse.tbl_opciones WHERE id_opciones = ?;";
                        $stm = $this->myCon->prepare($querySQL);
                        $stm->execute(array($id));

                        $r = $stm->fetch(PDO::FETCH_OBJ);

                        $u = new Opciones();

                        //_SET(CAMPOBD, atributoEntidad)			
                        $u->__SET('id_opciones', $r->id_opciones);
                        $u->__SET('opcion_descripcion', $r->opcion_descripcion);
                        $u->__SET('estado', $r->estado);
                       
                        $this->myCon = parent::desconectar();
                        return $u;
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }

        public function editOpciones(Opciones $tu)
        {
                try {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_opciones SET
                                            opcion_descripcion= ?,
                                            estado= ?
                                WHERE id_opciones= ?";

                        $this->myCon->prepare($sql)
                                ->execute(
                                        array(
                                                //$tu->__GET('usuario'), 


                                                $tu->__GET('opcion_descripcion'),
                                                $tu->__GET('estado'),
                                                $tu->__GET('id_opciones')

                                        )
                                );
                        $this->myCon = parent::desconectar();
                } catch (Exception $e) {
                        var_dump($e);
                        die($e->getMessage());
                }
        }

        public function deleteuser($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_opciones SET
                                                estado = 3
                                    WHERE id_opciones= ?";
    
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