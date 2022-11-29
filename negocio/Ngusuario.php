<?php

include_once("../entidades/Usuario.php");
include_once("../datos/DtUsuario.php");

$us = new Usuario;
$dtu = new DtUsuario();

if ($_POST) 
{
    
    $txt= $_POST["txt"];

    switch($txt){

        case 1:{
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('usuario', $_POST['usuario']);
                $us->__SET('pwd', $_POST['pwd']);
                $us->__SET('nombres', $_POST['nombre']);
                $us->__SET('apellidos', $_POST['apellido']);
                $us->__SET('email', $_POST['email']);
                $us->__SET('estado', 1);



               
                $dtu->insertuser($us);
                //var_dump($emp);
                header("Location: ../tblUsuario.php ?msj=1") ;
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
                $us->__SET('id_usuario', $_POST['id']);
                $us->__SET('usuario', $_POST['usuario']);
                $us->__SET('pwd', $_POST['pwd']);
                $us->__SET('nombres', $_POST['nombre']);
                $us->__SET('apellidos', $_POST['apellido']);
                $us->__SET('email', $_POST['email']);
                $us->__SET('estado', 2);

        
                $dtu->editUser($us);
                //var_dump($emp);

                header("Location: ../tblUsuario.php ?msj=1") ;
              
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
            
            $us->__SET('id_comunidad', $_GET['delU']);
            $dtu->deleteuser($us->__GET('id_usuario'));
            header("Location: ../tblusuario.php?msj=1") ;
        }
        catch(Exception $e)
        {
            header("Location: /HR/tbl_usuarios.php?msj=6");
            die($e->getMessage());
        }
    }
    if ($_GET) 
    {
        try 
        {
            
            $us->__SET('id_comunidad', $_GET['delU']);
            $dtu->deleteuser($us->__GET('id_comunidad'));
            header("Location: ../tblUsuario.php ?msj=1") ;
        }
        catch(Exception $e)
        {
            header("Location: /HR/tbl_usuarios.php?msj=6");
            die($e->getMessage());
        }
    }