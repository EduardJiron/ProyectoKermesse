<?php


include_once('conexion.php');

class Dtctgproducto extends conexion
{

        private $myCon;

        public function listctgproducto()
        {
                try {

                        $this->myCon = parent::conectar();
                        $result = array();
                        $querysql = "SELECT * FROM tbl_categoria_producto";

                        $stm = $this->myCon->prepare($querysql);
                        $stm->execute();

                        foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                                $ctg = new Ctgproducto();
                                $ctg->__SET('id_categoria_producto', $r->id_categoria_producto);
                                $ctg->__SET('nombre', $r->nombre);
                                $ctg->__SET('descripcion', $r->descripcion);
                                $ctg->__SET('estado', $r->estado);

                                $result[] = $ctg;
                        }

                        $this->myCon = parent::desconectar();
                        return $result;
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }

        public function insertctgproducto(Ctgproducto $com)
        {
                try {
                        $this->myCon = parent::conectar();
                        $querysql = "INSERT INTO dbkermesse.tbl_categoria_producto (nombre, descripcion, estado) VALUES (?,?,?)";

                        $stm = $this->myCon->prepare($querysql);
                        $stm->execute(array(
                                $com->__GET('nombre'),
                                $com->__GET('descripcion'),
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
                        $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto WHERE id_categoria_producto = ?;";
                        $stm = $this->myCon->prepare($querySQL);
                        $stm->execute(array($id));

                        $r = $stm->fetch(PDO::FETCH_OBJ);

                        $u = new Ctgproducto();

                        //_SET(CAMPOBD, atributoEntidad)			
                        $u->__SET('id_categoria_producto', $r->id_categoria_producto);
                        $u->__SET('nombre', $r->nombre);
                        $u->__SET('descripcion', $r->descripcion);
                        $u->__SET('estado', $r->estado);
                       
                        $this->myCon = parent::desconectar();
                        return $u;
                } catch (Exception $e) {
                        die($e->getMessage());
                }
        }

        public function editCtgProducto(CtgProducto $tu)
        {
                try {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_categoria_producto SET
                                            nombre= ?,
                                            descripcion= ?,
                                            estado= ?
                                WHERE id_categoria_producto= ?";

                        $this->myCon->prepare($sql)
                                ->execute(
                                        array(
                                                //$tu->__GET('usuario'), 


                                                $tu->__GET('nombre'),
                                                $tu->__GET('descripcion'),
                                                $tu->__GET('estado'),
                                                $tu->__GET('id_categoria_producto')

                                        )
                                );
                        $this->myCon = parent::desconectar();
                } catch (Exception $e) {
                        var_dump($e);
                        die($e->getMessage());
                }
        }

        public function deletectgproducto($id)
        {
                try 
                {
                        $this->myCon = parent::conectar();
                        $sql = "UPDATE dbkermesse.tbl_categoria_producto SET
                                                estado = 3
                                    WHERE id_categoria_producto= ?";
    
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
