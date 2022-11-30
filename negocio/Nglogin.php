<?php

include_once("../entidades/Usuario.php");
include_once("../datos/DtUsuario.php");

$us = new Usuario();
$dtu = new DtUsuario();

if ($_POST) 
{
     //obtenemos los valores ingresados por el usuario 
     $usuario=$_POST["user"];
     $password=$_POST["clave"];
     
     if(empty($usuario) and empty($password)){
         //nos envía al inicio
         header("Location: ../index.php?msj=1") ; 
     }
     else{
        $us = $dtu->validarUser($usuario, $password);
         if(empty($us)){
            
         header("Location: ../index.php?msj=2") ; 
         }
         else{
             //Iniciamos la sesion
             session_start();
             //Asignamos la sesion
             $_SESSION['acceso']=$us;
             //Si la variable de sesión está correctamente definida
             if (!isset($_SESSION['acceso'])) { 
                 //nos envía al inicio
                 header("Location: /HR/Login.php?access=400");      
             }
             else{
                 //nos envía al inicio
                 //var_dump($_SESSION['acceso']);
                 header("Location: ../principal.php?msj=1") ; 
             }
 
         }
     }
}
