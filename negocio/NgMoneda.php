<?php

include_once("../entidades/moneda.php");
include_once("../datos/DtMoneda.php");

$us = new moneda();
$dtu = new DtMoneda();


if ($_POST) 
{

    $txt= $_POST["txt"];

    switch($txt){

        case 1:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('nombre', $_POST['nombre']);
                $us->__SET('simbolo', $_POST['simbolo']);                
                $us->__SET('estado', 1);
                $dtu->insertMoneda($us);
                //var_dump($emp);
                header("Location: ../tblmoneda.php?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: ../tblmoneda?msj=1");
                die($e->getMessage());
            }
            break;
        }

        

        case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL}
                $us->__SET('id_moneda', $_POST['id']);
                $us->__SET('nombre', $_POST['nombre']);
                $us->__SET('simbolo', $_POST['simbolo']);                
                $us->__SET('estado', 2);

                $dtu->editMoneda($us);
                //var_dump($emp);

                header("Location: ../tblmoneda.php?msj=2") ;

            } 
            catch (Exception $e) 
            {

                die($e->getMessage());
            }
            break;


        }


    }

}

if ($_GET) 
{
    try 
    {

        $us->__SET('id_moneda', $_GET['delU']);
        $dtu->deleteMoneda($us->__GET('id_moneda'));
        header("Location: ../tblmoneda.php?msj=1") ;
    }
    catch(Exception $e)
    {
        header("Location: /kermessee/tblmoneda.php?msj=6");
        die($e->getMessage());
    }
}



