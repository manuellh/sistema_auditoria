<?php
include_once('php/conexion.php');

$alert='';
session_start();
if (!empty($_SESSION['active'])) {

  if (isset($_POST['embarcar'])) {
    $DBDashboard->embarcarPotosinos();
  }


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
  <!--DATATABLES CSS-->
  <link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/Responsive/css/responsive.dataTables.min.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading bg-dark text-white">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="clientes.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-user"></i> Clientes</a>
        <a href="paqueteria.php" class="list-group-item list-group-item-action bg-dark text-white">
          <i class="fas fa-boxes"></i> Paqueteria
        </a>
        <a href="auditar.php" class="list-group-item list-group-item-action bg-dark text-white">
          <i class="far fa-clipboard"></i> Auditoria
        </a>

        <a href="#" class="list-group-item list-group-item-action active text-white" data-toggle="collapse" data-target="#collapseEmbarque" aria-expanded="false" aria-controls="collapseExample">
          <i class="fas fa-truck"></i> Embarques
        </a>
        <div class="collapse show" id="collapseEmbarque">
          <div class="list-group">
            <a href="embarquePaquetexpress.php" class="list-group-item list-group-item-action">Paquetexpress</a>
            <a href="embarquePotosinos.php" class="list-group-item list-group-item-action list-group-item-dark">Potosinos</a>
          </div>
        </div>
        <a href="empleados.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa fa-users-cog"></i> Trabajadores</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-users"></i> Usuarios</a>
        <a href="../logout.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-out-alt"></i> Salir</a>
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
              <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
            </li>
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
        <h1 class="mt-4"><i class="fas fa-truck"></i> Embarques Potosinos</h1>
        <div class="fixed-bottom">
          <?php $DBDashboard->status(); ?>
        </div>
        <!--CONTENIDO-->
        <div class="row">

          <div class="col-lg-3 col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Embarcar</h5>
                <form method="post" id="formEmbarcar">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="estatusEmbarque" name="estatusEmbarque" value="EMBARCADO">
                  </div>
                  <div class="form-group">
                    <label for="umEmbarque">UM:</label>
                    <input type="text" class="form-control" id="umEmbarque" name="umEmbarque" autofocus required>
                  </div>
                  <button type="submit" name="embarcar" class="btn btn-success btn-block">EMBARCAR</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-sm-12">
            <table id="tablaEmbarques" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Fecha:</th>
                  <th scope="col">Destinatario:</th>
                  <th scope="col">UM:</th>
                  <th scope="col">Tipo:</th>
                  <th scope="col">Estatus:</th>
                </tr>
              </thead>
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
  <!--Datatables JS-->
  <script src="DataTables/datatables.min.js"></script>
  <script src="DataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="DataTables/Responsive/js/dataTables.responsive.min.js" charset="utf-8"></script>
  <!--SCRIPT-->
  <script src="js/embarcar.js" charset="utf-8"></script>
  <!-- Menu Toggle Script -->
  <script src="js/menuTogle.js" charset="utf-8"></script>

</body>

</html>
<?php
}else {
    header('location:../index.php');
}
 ?>
