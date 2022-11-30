<?php

include_once("../entidades/CategoriaGastos.php");
include_once("../datos/DtCategoriaGastos.php");

$us = new CategoriaGastos();
$dtu = new DtCategoriaGastos();



if ($_POST) 
{
    $txt= $_POST["txt"];

    switch($txt){

        case 1:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $us->__SET('descripcion', $_POST['descripcion']);               
                $us->__SET('estado', 1);
                $dtu->insertCategoriaGastos($us);
                //var_dump($emp);
                header("Location: ../tblCategoriaGastos.php ?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: kermessee/tblCategoriaGastos?msj=1");
                die($e->getMessage());
            }
            break;
        }

        

        case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL}
                $us->__SET('id_categoria_gastos', $_POST['id']);
                $us->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $us->__SET('descripcion', $_POST['descripcion']);
                $us->__SET('estado', 2);

                $dtu->editCategoriaGastos($us);
                //var_dump($emp);

                header("Location: ../tblCategoriaGastos.php?msj=2") ;

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

        $us->__SET('id_categoria_gastos', $_GET['delU']);
        $dtu->deleteCategoriaGastos($us->__GET('id_categoria_gastos'));
        header("Location: ../tblCategoriaGastos.php?msj=1") ;
    }
    catch(Exception $e)
    {
        header("Location: /kermessee/tblCategoriaGastos.php?msj=6");
        die($e->getMessage());
    }
}


    