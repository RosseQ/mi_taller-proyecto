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
    &nbsp
    <section class="clean-block clean-form dark">
        <div class="container">
            
            <div class="block-heading">
                
                <h2 class="text-info" style="color: var(--bs-blue);border-top-color: rgb(253,114,13);border-bottom-color: rgba(59,153,224,0);">Agregar Vehiculo</h2>
                <p></p>
            </div>

            <?php if(isset($_GET['error'])){ ?>
            <div id="error" style="width: 100%; background: rgb(0,15,255); text-align: center; border-radius: 2px; padding: 4px; ">
                <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
            </div>
            <?php } ?>

            <form action="/registro.php" method="POST" style="color: rgb(0,15,255);background: rgba(13,114,255,0.11);border-top-color: rgb(13,114,255);">
                <div class="mb-3">
                    <label class="form-label" for="economico_v">Economico</label>
                    <input class="form-control" type="text" id="economico_v" name="economico_v"
                        maxlength="11" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tipounidad_v">Tipo de unidad</label>
                    <input class="form-control" type="text" id="tipounidad_v" name="tipounidad_v"
                        maxlength="255" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="modelo_v">Modelo</label>
                    <input class="form-control" type="text" id="modelo_v" name="modelo_v"
                        maxlength="255" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div>
                <div class="mb-3"><label class="form-label" for="clase_vehiculo">Clase de vehiculo</label>
                    <select class="form-select" id="clase_vehiculo" name="clase_vehiculo">
                        <?php 
                            $consulta = "SELECT id_Cat_Clase_Vehiculo, descripcion
                            FROM cat_clase_Vehiculo";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="clase_vehiculo" name="clase_vehiculo" value="<?php echo $mostrar['id_Cat_Clase_Vehiculo'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3"><label class="form-label" for="tipo_vehiculo">Tipo</label>
                    <select class="form-select" id="tipo_vehiculo" name="tipo_vehiculo">
                        <?php 
                            $consulta = "SELECT id_Cat_Tipo, descripcion
                            FROM cat_tipo";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="tipo_vehiculo" name="tipo_vehiculo" value="<?php echo $mostrar['id_Cat_Tipo'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3"><label class="form-label" for="adaptacion_v">Adaptacion</label>
                    <select class="form-select" id="adaptacion_v" name="adaptacion_v">
                        <?php 
                            $consulta = "SELECT id_Cat_Adaptacion, descripcion
                            FROM cat_adaptacion";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="adaptacion_v" name="adaptacion_v" value="<?php echo $mostrar['id_Cat_Adaptacion'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="placas_v">Placas</label>
                    <input class="form-control" type="text" id="placas_v" name="placas_v" style="text-transform:uppercase;"
                        maxlength="7" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)"
                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="noserie_v">No. de Serie</label>
                    <input class="form-control" type="text" id="noserie_v" name="noserie_v" style="text-transform:uppercase;"
                        maxlength="20" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)"
                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="carga_util_v">Carga Util</label>
                    <input class="form-control" type="text" id="carga_util_v" name="carga_util_v"
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label" for="id_costo_v">id costo</label>
                    <input class="form-control" type="text" id="id_costo_v" name="id_costo_v"
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div> -->
                <div class="mb-3">
                    <label class="form-label" for="precio_dia_v">Precio por dia</label>
                    <input class="form-control" type="text" id="precio_dia_v" name="precio_dia_v"
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="precio_semana_v">Precio por semana</label>
                    <input class="form-control" type="text" id="precio_semana_v" name="precio_semana_v"
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="precio_mes_v">Precio por mes</label>
                    <input class="form-control" type="text" id="precio_mes_v" name="precio_mes_v"
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                <center>
                    <input class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);" id="agregar_v" name="agregar_v" value="Enviar">
                </center>
            </form>

        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>