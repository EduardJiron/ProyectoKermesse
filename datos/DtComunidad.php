
<?php


include_once('conexion.php');

class DtComunidad extends conexion
{

        private $myCon;

        public function listComunidad()
        {
                try {

                        $this->myCon = parent::conectar();
                        $result = array();
                        $querysql = "SELECT * FROM tbl_comunidad";

                        $stm = $this->myCon->prepare($querysql);
                        $stm->execute();

                        foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                                $com = new Comunidad();
                                $com->__SET('id_comunidad', $r->id_comunidad);
                                $com->__SET('nombre', $r->nombre);
                                $com->__SET('responsable', $r->responsable);
                                $com->__SET('desc_contribucion', $r->desc_contribucion);
                                $com->__SET('estado', $r->estado);

                                $result[] = $com;
                        }

                        $this->myCon = parent::desconectar();
                        return $result;
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }


        public function insertcomu(Comunidad $com)
        {
                try {
                        $this->myCon = parent::conectar();
                        $querysql = "INSERT INTO dbkermesse.tbl_comunidad (nombre, responsable, desc_contribucion, estado) VALUES (?,?,?,?)";

                        $stm = $this->myCon->prepare($querysql);
                        $stm->execute(array(
                                $com->__GET('nombre'),
                                $com->__GET('responsable'),
                                $com->__GET('desc_contribucion'),
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
                        $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad WHERE id_comunidad = ?;";
                        $stm = $this->myCon->prepare($querySQL);
                        $stm->execute(array($id));

                        $r = $stm->fetch(PDO::FETCH_OBJ);

                        $u = new Comunidad();

                        //_SET(CAMPOBD, atributoEntidad)			
                        $u->__SET('id_comunidad', $r->id_rol);
                        $u->__SET('nombre', $r->nombre);
                        $u->__SET('responsable', $r->responsable);
                        $u->__SET('desc_contribucion', $r->desc_contribucion);
                        $u->__SET('estado', $r->estado);


                        $this->myCon = parent::desconectar();
                        return $u;
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }

        public function editcomunidad(Comunidad $tu)
        {
                try {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_comunidad SET
                                            nombre= ?,
                                            responsable= ?,
                                            desc_contribucion= ?,
                                            estado= ?
                                WHERE id_comunidad= ?";

                        $this->myCon->prepare($sql)
                                ->execute(
                                        array(
                                                //$tu->__GET('usuario'), 

                                                $tu->__GET('nombre'),
                                                $tu->__GET('responsable'),
                                                $tu->__GET('desc_contribucion'),
                                                $tu->__GET('estado'),
                                                $tu->__GET('id_comunidad')


                                        )
                                );
                        $this->myCon = parent::desconectar();
                } catch (Exception $e) {
                        var_dump($e);
                        die($e->getMessage());
                }
        }
}



?>