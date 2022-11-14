<?php

include 'datos/DtComunidad.php';
include 'entidades/Comunidad.php';

$dt = new DtComunidad();
$comunidad = new Comunidad();



//variable de control msj
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestión de Comunidad</title>
        <!--<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />-->
        <!-- Plantilla -->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styles6.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/styles7.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="fontawesome-free-6.2.0/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="./DataTables/datatables.min.css">
        <link rel="stylesheet" href="./DataTables/Responsive-2.3.0/css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="./DataTables/Buttons-2.2.3/css/buttons.bootstrap.min.css">
        <!-- jAlert css  -->
        <link rel="stylesheet" href="./jAlert/dist/jAlert.css" />
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/bg.mp4" type="video/mp4" /></video>
        <div class="masthead">
            
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
               
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Gestionar Datos de una comunidad</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                            <li class="breadcrumb-item active">Gestión de Comunidad</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                En esta pantalla se pueden visualizar y gestionar los datos de los comunidades activas/inactivas. 
                                Para crear un nueva comunidad por favor de clic en el botón: 
                                <a target="_blank" href="newUsuario.php"><i class="fa-solid fa-user-plus"></i> Nueva comunidad</a>.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Comunidades Activas
                            </div>
                            <div class="card-body">
                                <table id="tbl_comunidad" class="table table-bordered table-striped">
                                    <thead>

                                    <!-- Campos que van a aparecer en la pagina en linea-->


                                        <tr>                                        
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Responsable</th>
                                            <th>Descuento contribucion</th>
                                            <th>Estado </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        foreach ($dt->listComunidad() as $r):
                                        ?>

                                        <tr>
                                            <td>
                                        <?php echo $r->__GET("id_comunidad"); ?>
                                            </td>
                                            <td>
                                        <?php echo $r->__GET("nombre"); ?>
                                        
                                            
                                        </td>
                                          
                                            <td>   <?php echo $r->__GET("responsable"); ?></td>
                                            <td>   <?php echo $r->__GET("desc_contribucion"); ?></td>
                                            <td>   <?php echo $r->__GET("estado"); ?></td>

                                           

                                            <td>
                                                <a href="#" target="_blank" title="Visualizar los datos de la comunidad">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>&nbsp;
                                                <a href="#" target="_blank" title="Modificar los datos de la comunidad">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </a>&nbsp;
                                                <a href="#" target="_blank" title="Dar de baja a una comunidad">
                                                    <i class="fa-solid fa-user-minus"></i> 
                                                </a>
                                            </td>
                                            
                                            <?php

endforeach;
?>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
               
              
            </div>
</div>
        </div>
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
        successAlert('Éxito', 'Los datos han sido registrados exitosamente!');
    }


/////////// DATATABLE ///////////
$(document).ready( function (){
    
    $("#tbl_comunidad").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"],
      "language": {
        "aria": {
        "sortAscending": "Activar para ordenar la columna de manera ascendente",
        "sortDescending": "Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "collection": "Colección",
        "colvis": "Visibilidad",
        "colvisRestore": "Restaurar visibilidad",
        "copy": "Copiar",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "createState": "Crear Estado",
        "removeAllStates": "Borrar Todos los Estados",
        "removeState": "Borrar Estado",
        "renameState": "Renombrar Estado",
        "savedStates": "Guardar Estado",
        "stateRestore": "Restaurar Estado",
        "updateState": "Actualizar Estado"
    },
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "processing": "Procesando...",
    "search": "Buscar:",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor",
        "data": "Datos"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "countFiltered": "{shown} ({total})",
        "collapseMessage": "Colapsar",
        "showMessage": "Mostrar Todo"
    },
    "decimal": ".",
    "emptyTable": "No hay datos disponibles en la tabla",
    "zeroRecords": "No se encontraron coincidencias",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
    "lengthMenu": "Mostrar _MENU_ entradas",
    "stateRestore": {
        "removeTitle": "Eliminar",
        "creationModal": {
            "search": "Buscar"
        }
    },
    "infoEmpty": "No hay datos para mostrar"
        }
    }).buttons().container().appendTo('#tbl_comunidad_wrapper .col-md-6:eq(0)');

});



});//FIN  $(document).ready()


</script>




    </body>
</html>