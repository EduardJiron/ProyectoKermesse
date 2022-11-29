<?php

include_once("../entidades/Parroquia.php");
include_once("../datos/DtParroquia.php");

$par = new Parroquia();
$dtu = new DtParroquia ();

if ($_POST) 
{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $par->__SET('nombre', $_POST['nombre']);
                $par->__SET('direccion', $_POST['direccion']);
                $par->__SET('telefono', $_POST['telefono']);
                $par->__SET('parroco', $_POST['parroco']);
                $par->__SET('logo',"bruh");
                $par->__SET('sitio_web', $_POST['sitio_web']);

                $dtu->insertparro($par);

                //var_dump($emp);
                header("Location: ../tblParroquia.php?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: finalweb/tblParriquia.php?msj=1");
                die($e->getMessage());
            }
    }