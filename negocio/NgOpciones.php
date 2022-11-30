<?php

include_once("../entidades/opciones.php");
include_once("../datos/DtOpciones.php");

$us = new Opciones();
$dtu = new DtOpciones ();

if ($_POST) 
{

    $txt= $_POST["txt"];

    switch($txt){


        case 1:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                $us->__SET('estado', 1);
                $dtu->insertopciones($us);
                //var_dump($emp);
                header("Location: ../tblOpciones.php ?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: 28-11-22/tblOpciones.php ?msj=1");
                die($e->getMessage());
            }
            break;
        }

        case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('id_opciones', $_POST['id']);
                $us->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                $us->__SET('estado', 2);
                $dtu->editOpciones($us);
                //var_dump($emp);
                header("Location: ../tblOpciones.php ?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: 28-11-22/tblOpciones.php ?msj=1");
                die($e->getMessage());
            }
            break;

        }

     }



    }