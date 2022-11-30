<?php

include_once("../entidades/Denominacion.php");
include_once("../datos/DtDenominacion.php");

$us = new Denominacion();
$dtu = new DtDenominacion();



if ($_POST) 
{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('id_Moneda', 1);
                $us->__SET('valor', $_POST['valor']);
                $us->__SET('valor_letras', $_POST['valor_letras']);
                $us->__SET('estado', 1);
                $dtu-> insertDenominacion($us);
                //var_dump($emp);
                header("Location: ../tblDenominacion.php?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: kermessee/tblDenominacion.php?msj=1");
                die($e->getMessage());
            }
    }
    