

<?php


//error_reporting(0);

session_start();
session_unset(); // Borrar las variables de sesión

// Destruir la sesión
if (session_destroy()) {
    //var_dump($miPagina);
    echo "La sesión ha sido cerrada correctamente";
} else {
    echo "Error al destruir la sesión";
}
$varMsj = 0;
if(isset($varMsj))
{ 
   $varMsj = $_GET['msj'];
}

?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Coming Soon - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles6.css" rel="stylesheet" />
        <link href="css/styles7.css" rel="stylesheet" />
        <link rel="stylesheet" href="./jAlert/dist/jAlert.css" />

    </head>
    <body>
        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/bg.mp4" type="video/mp4" /></video>
        <!-- Masthead-->
        <div class="masthead">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de sesion </h3></div>
                            <div class="card-body">
                                
                            <form action="./negocio/Nglogin.php" method="POST">
                                    <div class="row mb-3">
                                      
                                    

                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="user" name="user" type="text" placeholder="name@example.com" />
                                        <label for="inputEmail">Usuario</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="clave"  name="clave" type="password" placeholder="name@example.com" />
                                        <label for="inputEmail">Contraseña</label>
                                    </div>
                               
                                    <div class="mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary btn-block" value="Iniciar sesion" />
                                    </div>
                                </form>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="#!"><i ></i>sobre nosotros</a>
                <a class="btn btn-dark m-3" href="#!">Acerca de</a>
                
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
          <!-- jQuery -->
          <script src="js/scripts.js"></script>
        <script src="DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
       
        <!-- Descargar el bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
       
        <!-- JS DATATABLES -->
        <script src="./DataTables/datatables.min.js"></script>
        <!--<script src="./DataTables/Responsive-2.3.0/js/responsive.bootstrap5.min.js"></script>-->
        <script src="./DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="./DataTables/Responsive-2.3.0/js/responsive.dataTables.min.js"></script>
        <script src="./DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="./DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
        <script src="./DataTables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="./DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="./DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="./DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
        <script src="./DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
        <script src="./DataTables/Buttons-2.2.3/js/buttons.colVis.min.js"></script>

        <!--script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>-->
        <script src="fontawesome-free-6.2.0/js/all.min.js"></script>

         <!-- jAlert js -->
        <script src="./jAlert/dist/jAlert.min.js"></script>
        <script src="./jAlert/dist/jAlert-functions.min.js"> //optional!!</script>

     

        <script>

$(document).ready(function ()
{
    /////////// VARIABLE DE CONTROL MSJ ///////////
    var mensaje = 0;
    mensaje = "<?php echo $varMsj ?>";

    if(mensaje == "1")
    {
        errorAlert('Error', 'Por favor rellene los campos');
    }
    if(mensaje == "2")
    {
        errorAlert('Error', 'Error de usuario o contraseña');
    }
});




</script>


    </body>
</html>
