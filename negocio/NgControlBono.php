<?php

include_once("../entidades/conBono.php");
include_once("../datos/DtConBono.php");

$par = new conBono();
$dtu = new DtConBono();

if ($_POST) 
{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $par->__SET('nombre', $_POST['Nombre']);
                $par->__SET('valor', $_POST['valor']);
                $par ->__SET('estado', 1);

               $dtu->insertBono($par);

                //var_dump($emp);
                header("Location: ../tblconBono.php?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: finalweb/tblconBono.?msj=1");
                die($e->getMessage());
            }
      
  }