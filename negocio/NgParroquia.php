<?php

include_once("../entidades/Parroquia.php");
include_once("../datos/DtParroquia.php");

$par = new Parroquia();
$dtu = new DtParroquia ();

if ($_POST) 
{

    $txt= $_POST["txt"];

    switch($txt){
        case 1:{ 
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
                $par->__SET('estado', 1);

                $dtu->insertparro($par);

                //var_dump($emp);
                header("Location: ../tblParroquia.php?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: finalweb/tblParriquia.php?msj=1");
                die($e->getMessage());
            } 
            break;           
        }

        case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL}
                $par->__SET('idParroquia', $_POST['id']);
                $par->__SET('nombre', $_POST['nombre']);
                $par->__SET('direccion', $_POST['direccion']);
                $par->__SET('telefono', $_POST['telef']);
                $par->__SET('parroco', $_POST['parroco']);
                $par->__SET('logo',"bruh");
                $par->__SET('sitio_web', $_POST['sitio_web']);
                $par->__SET('estado', 2);
                
               
        
                $dtu->editparroq($par);
                //var_dump($emp);

                header("Location: ../tblparroquia.php?msj=1") ;
              
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
            
            $par->__SET('idParroquia', $_GET['delU']);
            $dtu->deletparro($par->__GET('idParroquia'));
            header("Location: ../tblparroquia.php?msj=1") ;
        }
        catch(Exception $e)
        {
            header("Location: finalweb/tblparroquia.php?msj=6");
            die($e->getMessage());
        }
    }