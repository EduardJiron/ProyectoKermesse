<?php

include_once("../entidades/Comunidad.php");
include_once("../datos/DtComunidad.php");

$us = new Comunidad();
$dtu = new DtComunidad ();

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
                $us->__SET('responsable', $_POST['Responsable']);
                $us->__SET('desc_contribucion', $_POST['Desc_contribucion']);
                $us->__SET('estado', 1);
                $dtu->insertcomu($us);
                //var_dump($emp);
                header("Location: ../tblcomunidad.php ?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: ../tblcomunidad?msj=1");
                die($e->getMessage());
            }
            break;
        }

        case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL}
                $us->__SET('id_comunidad', $_POST['id']);
                $us->__SET('nombre', $_POST['Nombre']);
                $us->__SET('responsable', $_POST['Responsable']);
                $us->__SET('desc_contribucion', $_POST['Desc_contribucion']);
                $us->__SET('estado', 1);
        
                $dtu->editcomunidad($us);
                //var_dump($emp);

                header("Location: ../tblcomunidad.php?msj=1") ;
              
            } 
            catch (Exception $e) 
            {
              
                die($e->getMessage());
            }
            break;


        }


    }

       
    }