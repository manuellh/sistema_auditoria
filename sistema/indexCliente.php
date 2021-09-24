<?php
include_once('php/conexion.php');

$alert='';
session_start();
$usuario = $_SESSION['usuario'];
$privilegios = $_SESSION['privilegios'];
$session = $_SESSION['active'];
if (!empty($session AND $privilegios == 2 AND $usuario = get_current_user())) {
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auditoria</title>
  <link rel="icon" type="https://cdn.sstatic.net/Sites/es/img/apple-touch-icon.png?v=7739871010e6">

  <!--CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--SIDENAV-->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <!--ICONOS-->
  <script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
</head>

<body onload="startTime()">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading bg-dark text-white">Auditoria de Producto</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action active text-white"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="auditar.php" class="list-group-item list-group-item-action bg-dark text-white">
          <i class="far fa-clipboard"></i> Auditoria
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white" data-toggle="collapse" data-target="#collapseEmbarque" aria-expanded="false" aria-controls="collapseExample">
          <i class="fas fa-truck"></i> Embarques
        </a>
        <div class="collapse" id="collapseEmbarque">
          <div class="list-group">
            <a href="embarquePaquetexpress.php" class="list-group-item list-group-item-action">Paquetexpress</a>
            <a href="embarquePotosinos.php" class="list-group-item list-group-item-action">Potosinos</a>
          </div>
        </div>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-home"></i> Menú</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="auditar.php">Auditoria</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opciones
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesion"><i class="fas fa-sign-out-alt"></i> Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9 col-lg-9"></div>
          <div class="col-sm-3 col-lg-3">
            <div id="clockdate">
              <div class="clockdate-wrapper">
                <div id="clock"></div>
                <div id="date"></div>
              </div>
            </div>
          </div>
        </div>

        <h1 class="mt-4"><i class="fas fa-chart-line"></i> Dashboard</h1>
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-sm-12 col-lg-4">
            <div class="card text-white bg-danger mb-3">
              <div class="card-header">Errores Auditados Producto Final</div>
              <div class="card-body">
                <div class="row">
                  <div class="col"><i class="fas fa-times-circle fa-3x"></i></div>
                  <div class="col"><h1><?php $Datos->totalErrores(); ?> </h1></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-4">
            <div class="card text-white bg-success mb-3">
              <div class="card-header">Paquetes auditados por dia</div>
              <div class="card-body">
                <div class="row">
                  <div class="col"><i class="fas fa-clipboard fa-3x"></i></div>
                  <div class="col"><h1>21</h1></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <table>
              <thead>
                <tr>
                  <th>No.Empleado</th>
                  <th>Errores</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <!--CONTENIDO-->
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Menu Toggle Script -->
  <script src="js/menuTogle.js" charset="utf-8"></script>
  <script src="js/clock.js"></script>
</body>

</html>
<?php
}
else {
    header('location:sessions.php');
}
 ?>
