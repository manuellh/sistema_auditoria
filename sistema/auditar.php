<?php
include_once('php/conexion.php');

$alert='';
session_start();
if (!empty($_SESSION['active'])) {
  if (isset($_POST['auditar'])) {
    $DBDashboard->nuevaAuditoria();
  }elseif (isset($_POST['editar'])) {
    $DBDashboard->actualizarRegistro();
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

  <!--CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--SIDENAV-->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <!--ICONOS-->
  <script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
  <!--AUTOCOMPLETE CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/jquery/jquery-ui.min.css">
  <!--DATATABLE CSS-->
  <link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/Responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/Buttons/css/buttons.dataTables.min.css">

</head>
<style media="screen">
  .top-1{
    top: 10px;
  }
</style>
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
        <a href="auditar.php" class="list-group-item list-group-item-action active text-white">
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
            <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="clientes.php">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" href="paqueteria.php">Paqueteria</a></li>
            <li class="nav-item active"><a class="nav-link" href="auditar.php">Auditoria</a></li>
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
        <div class="row">
          <div id="clockdate">
            <div class="clockdate-wrapper">
              <div id="clock"></div>
              <div id="date"></div>
            </div>
          </div>
        </div>

        <h1 class="mt-4"><i class="far fa-clipboard"></i> Auditar</h1>
        <div class="fixed-bottom">
          <?php $DBDashboard->status(); ?>
        </div>

        <div class="row">
          <div class="col-lg-3 col-sm-12">
            <div class="card border-primary">
              <div class="card-body">
                <form id="formAuditar" method="post">
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="fecha">Fecha:</label>
                      <input type="date" name="fecha" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="estatus">Estatus:</label>
                      <select class="custom-select mr-sm-2" id="estatus" name="estatus">
                        <option value="AUDITADO">AUDITADO</option>
                        <option value="ERROR">INCIDENCIA</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="comentarios">Comentarios:</label>
                      <textarea name="comentarios" id="comentarios" class="form-control" rows="8">CORRECTO</textarea>
                    </div>
                    <div id="datosIncidencia" class="col-sm-12">
                      <div class="card text-white bg-danger">
                        <div class="card-body">
                          <h5 class="card-title">Datos Incidencia</h5>
                          <div class="row">
                            <div class="form-group col-sm-12">
                              <label for="piezas">Piezas:</label>
                              <input type="text" name="piezas" id="piezas" class="form-control">
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="estatus">Empaco:</label>
                              <select class="custom-select mr-sm-2" id="empaco" name="empaco">
                                <option selected></option>
                                <?php $Datos->listaEmpleados(); ?>
                              </select>
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="estatus">surtio:</label>
                              <select class="custom-select mr-sm-2" id="surtio" name="surtio">
                                <option selected></option>
                                <?php $Datos->listaEmpleados(); ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-12 top-1">
                      <label for="UM">UM:</label>
                      <input id="UM" name="UM" type="text" class="form-control" value="521000021" autofocus>
                      <input id="idPaquete" name="idPaquete" type="hidden" class="form-control">
                    </div>
                    <div class="col top-1 col-sm-12" id="btnAuditar">
                      <input type="submit" name="auditar" value="Terminar" class="btn btn-success btn-block">
                    </div>
                    <div id="btnGroup" class="btn-group col col-sm-12" role="group" aria-label="Basic example" >
                      <button type="submit" name="editar" class="btn btn-success">Actualizar</button>
                      <button type="button" class="btn btn-warning" id="btnCancelar">Cancelar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-sm-12">
            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="tablaAuditoria">
                      <thead>
                        <tr>
                          <th scope="col">Fecha</th>
                          <th scope="col">No. Cliente</th>
                          <th scope="col">Cliente</th>
                          <th scope="col">Referencia</th>
                          <th scope="col">UM</th>
                          <th scope="col">Entrega de envio</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Comentario</th>
                          <th scope="col">Pieza</th>
                          <th scope="col">Empaco</th>
                          <th scope="col">Surtio</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/jquery-ui.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/autocomplete.js" charset="utf-8"></script>
  <!-- Menu Toggle Script -->
  <script src="js/menuTogle.js" charset="utf-8"></script>
  <!--scripts-->
  <script src="js/scripts.js"></script>
  <!--DataTables-->
    <script src="DataTables/datatables.min.js"></script>
    <script src="DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script src="DataTables/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="DataTables/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="DataTables/Buttons/js/buttons.flash.min.js"></script>
    <script src="DataTables/JSZip/jszip.min.js"></script>
    <script src="DataTables/Buttons/js/buttons.html5.min.js"></script>


</body>

</html>
<?php
}else {
    header('location:../index.php');
}
 ?>
