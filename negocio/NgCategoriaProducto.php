<?php

include_once("../entidades/ctgproducto.php");
include_once("../datos/Dtctgproducto.php");

$us = new Ctgproducto();
$dtu = new Dtctgproducto ();

if ($_POST) 
{

    $txt= $_POST["txt"];

    switch($txt){

        case 1:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('nombre', $_POST['Nombre']);
                $us->__SET('descripcion', $_POST['descripcion']);
                $us->__SET('estado', 1);
                $dtu->insertctgproducto($us);
                //var_dump($emp);
                header("Location: ../tblctgproducto.php ?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: 28-11-22/tblctgproducto.php ?msj=1");
                die($e->getMessage());
            }
            break;
        }

        case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('id_categoria_producto', $_POST['id']);
                $us->__SET('nombre', $_POST['Nombre']);
                $us->__SET('descripcion', $_POST['descripcion']);
                $us->__SET('estado', 2);
                $dtu->editCtgProducto($us);
                //var_dump($emp);
                header("Location: ../tblctgproducto.php ?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: 28-11-22/tblctgproducto.php ?msj=1");
                die($e->getMessage());
            }
            break;
        }

    }

}