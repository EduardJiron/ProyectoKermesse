<?php

include_once("../entidades/conBono.php");
include_once("../datos/DtConBono.php");

$dtu = new DtConBono();
$par = new conBono();
if ($_POST) 

{
  
    $txt= $_POST["txt"];

    switch($txt){
         case 1:{
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
            break;
         } 

         case 2:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL}
                $par->__SET('id_bono', $_POST['id']);
                $par->__SET('nombre', $_POST['Nombre']);
                $par->__SET('valor', $_POST['valor']);
                $par ->__SET('estado', 2);
                
               
        
                $dtu->editBonos($par);
                //var_dump($emp);

                header("Location: ../tblconBono.php?msj=4") ;
              
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
          
          $par->__SET('id_bono', $_GET['delU']);
          $dtu->deleBono($par->__GET('id_bono'));
          header("Location: ../tblconBono.php?msj=1") ;
      }
      catch(Exception $e)
      {
          header("Location: finalweb/tblconBono.php?msj=6");
          die($e->getMessage());
      }
  }  