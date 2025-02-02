<?php
include("../../db.php");

    session_start();
        
    if(!isset($_SESSION['id'])){
        header("Location: ../../index.php");
    }

    $id_u = $_SESSION['id'];
    $username = $_SESSION['username'];

?>

<?php
include("../../db.php");
?>

<!DOCTYPE html>
<html style="background: rgba(255,255,255,0);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Badges.css">
    <link rel="stylesheet" href="assets/css/Features-Centered-Icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap5.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="icon" href="/assets/img/logo-icono.png">
    <style type="text/css">
        * {
            margin:0px;
            padding:0px;
        }
        #header {
            margin:auto;
            width:500px;
            font-family:Arial, Helvetica, sans-serif;
        }
        ul, ol {
            list-style:none;
        }
        .nav {
            width:500px; /*Le establecemos un ancho*/
            margin:0 auto; /*Centramos automaticamente*/
        }
        .nav > li {
            float:left;
        }
        .nav li a {
            background-color: #ffffff  ;
            color: #000000 ;  /*color de letras*/
            text-decoration:none;
            padding:20px 12px;
            display:block;p
            
        }
        .nav li a:hover {
            background-color:  #8c8cff  ;
        }
        .nav li ul {
            display:none;
            position:absolute;
            min-width:140px;
        }
        .nav li:hover > ul {
            display:block;
        }
        .nav li ul li {
            position:relative;
        }
        .nav li ul li ul {
            right:-140px;
            top:0px;
        }
        body{
            background-color: #ffffff;
            font-family: Arial;
        }

        #main-container{
            margin: 150px auto;
            width: 600px;
        }

        table{
            background-color: white;
            text-align: left;
            border-collapse: collapse;
            width: 100%;
        }

        th, td{
            padding: 20px;
            text-indent: 10px;
            font-size: 20px;
        }

        thead{
            background-color: #246355;
            border-bottom: solid 5px #0F362D;
            color: white;
        }

        tr:nth-child(even){
            background-color: #ddd;
        }

        tr:hover td{
            background-color: #f3ffaa;
            color: black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA|IDEALEASE</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            
            <div class="collapse navbar-collapse" id="navcol-1">
            <div id="header">
                    <nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
                        <ul class="nav">
                            <li><a >Renta</a>
                                <ul>
                                    <li><a href="/ingresos/nuevoIngreso/index.php">Realizar renta</a></li>
                                    <li><a href="/ingresos/verIngresos/index.php">Ver rentas</a></li>
                                    <li><a href="/ingresos/devolucion_vehiculo/index.php">Camiones en renta</a></li>
                                </ul> 
                            </li>
                            <li><a >Clientes</a>
                                <ul>
                                    <li><a href="/Clientes/AgregarClientes/index.php">Resgistrar Cliente</a></li>
                                    <li><a href="/Clientes/ConsultaClientes/index.php">Ver Clientes</a></li>
                                </ul>
                            </li>
                            <li><a >Vehiculos</a>
                                <ul>
                                    <li><a href="/Vehiculos/agregarVehiculos/index.php">Registrar vehiculo</a></li>
                                    <li><a href="/Vehiculos/consultaVehiculos/index.php">Ver vehiculos</a></li>
                                </ul>
                            </li>
                            <li><a>Mantenimiento</a>
                                <ul>
                                    <li><a href="/Mantenimientos/nuevoMantenimiento/index.php">Registrar mantenimiento</a></li>
                                    <li><a href="/Mantenimientos/verMantenimientos/index.php">Ver mantenimiento</a></li>    
                                </ul>
                            </li>
                        </ul>
                    </nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../logout.php">CERRAR SESION</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark">
        <section class="clean-block clean-form dark" style="background: rgba(246,246,246,0);">
            <div class="container">
            &nbsp
                <div class="block-heading">
                    <h2 class="text-info">Ver Vehiculos</h2>
                    <p></p>
                </div>
            </div>

            <?php if(isset($_GET['error'])){ ?>
            <div id="error" style="width: 100%; background: rgb(0,15,255); text-align: center; border-radius: 2px; padding: 4px; ">
                <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
            </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table" id="tabla_v" >
                    <thead>
                        <tr>
                            <!-- <th style="background: rgb(0, 0, 255);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0);color: whitesmoke; margin: auto;">Economico</th> -->
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Economico</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Tipo de Unidad</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Modelo</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Clase de Vehiculo</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Categoria</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Adaptación</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Placas</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">No de Serie</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Carga Util</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Dia</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Semana</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Mes</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Disponibilidad</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Eliminar</th>
                        </tr>
                    </thead>
                    <?php 
                            $consulta = "select vehiculos.id_vehiculo as 'ROW0', vehiculos.tipo_unidad as 'ROW1', vehiculos.modelo as 'ROW2',
                            Cat_Clase_Vehiculo.descripcion as 'ROW3', Cat_Tipo.descripcion as 'ROW4',
                            Cat_Adaptacion.descripcion as 'ROW5', vehiculos.placas as 'ROW6',
                            vehiculos.economico as 'ROW7', vehiculos.numero_serie as 'ROW8', vehiculos.carga_uti as 'ROW9',
                            costos.precio_dia as 'ROW10', costos.precio_sem as 'ROW11', costos.precio_mes as 'ROW12',
                            Cat_VEstatus.descripcion as 'ROW13', vehiculos.id_DEstatus as 'ROW14'
                            from vehiculos
                            INNER JOIN Cat_Clase_Vehiculo on vehiculos.id_Cat_Clase_Vehiculo = Cat_Clase_Vehiculo.id_Cat_Clase_Vehiculo
                            INNER JOIN Cat_Tipo on vehiculos.id_Cat_Tipo = Cat_Tipo.id_Cat_Tipo
                            INNER JOIN Cat_Adaptacion on vehiculos.id_Cat_Adaptacion = Cat_Adaptacion.id_Cat_Adaptacion
                            INNER JOIN Costos on vehiculos.id_Costo = Costos.id_Costo
                            INNER JOIN Cat_VEstatus on vehiculos.id_VEstatus = Cat_VEstatus.id_VEstatus
                            WHERE id_DEstatus = 1
                            order by vehiculos.economico asc";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                            
                    ?>
                        <tbody>
                            <tr>
                                <td style=""><?php echo $mostrar['ROW7'] ?></td> <!--economico-->
                                <td style=""><?php echo $mostrar['ROW1'] ?></td> <!--no serie-->
                                <td style=""><?php echo $mostrar['ROW2'] ?></td> <!--modelo-->
                                <td style=""><?php echo $mostrar['ROW3'] ?></td> <!--clase de vehiculo-->
                                <td style=""><?php echo $mostrar['ROW4'] ?></td> <!--categoria-->
                                <td style=""><?php echo $mostrar['ROW5'] ?></td> <!--adaptacion-->
                                <td style=""><?php echo $mostrar['ROW6'] ?></td> <!--placas-->
                                <td style=""><?php echo $mostrar['ROW8'] ?></td> <!--no serie-->
                                <td style=""><?php echo $mostrar['ROW9'] ?> Ton.</td> <!--carga util-->
                                <td style="">$<?php echo $mostrar['ROW10'] ?></td> <!--no serie-->
                                <td style="">$<?php echo $mostrar['ROW11'] ?></td> <!--no serie-->
                                <td style="">$<?php echo $mostrar['ROW12'] ?></td> <!--no serie-->
                                <td style="text-align: center;">
                                    <form action="/registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="disponible_v" id="disponible_v" value="<?php echo $mostrar['ROW0'] ?>" 
                                            style="background: none !important; border: none !important; font-weight: bold;" onclick="return ConfirmarRestaurar()"><?php echo $mostrar['ROW13'] ?>
                                        </button>
                                    </form>
                                </td> <!--no serie-->
                                <td style="" >
                                    <form action="/registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="eliminar_v" id="eliminar_v" value="<?php echo $mostrar['ROW0'] ?>" 
                                            style="background: none !important; border: none !important;" onclick="return ConfirmarDelete()">
                                            <img src="/assets/img/deletear.png" width="50" height="50" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </section>
    </section>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

    <script type="text/javascript">
        function ConfirmarDelete()
        {
            var respuesta = confirm("¿Estas seguro que Deceas Eliminarlo?");

            if (respuesta == true){
                return true;
            } else {
                return false;
            }

        }
        function ConfirmarRestaurar()
        {
            var respuesta = confirm("¿Cambiar disponibilidad de vehiculo?");

            if (respuesta == true){
                return true;
            } else {
                return false;
            }

        }
    </script>
    <script>
        var tabla_v = document.querySelector("#tabla_v");
        var dataTable = new DataTable(tabla_v,{
            perPage: 10,
            perPageSelect:[10,20,30,40]
        });
    </script>

</body>

</html>