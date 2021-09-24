<?php
include_once('php/conexion.php');

$alert='';
session_start();
if (!empty($_SESSION['active'])) {
  if (isset($_POST['registrarCliente'])) {
    $DBDashboard->nuevoCliente();
  }elseif (isset($_POST['editar'])) {
    $DBDashboard->editarCliente();
  }elseif (isset($_POST['eliminarCliente'])) {
    $DBDashboard->eliminarCliente();
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

 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--SIDENAV-->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <!--ICONOS-->
  <script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
  <!--DATATABLE CSS-->
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/Responsive/css/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/Responsive/css/responsive.bootstrap4.min.css">



</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading bg-dark text-white">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="clientes.php" class="list-group-item list-group-item-action active text-white"><i class="fas fa-user"></i> Clientes</a>
        <a href="paqueteria.php" class="list-group-item list-group-item-action bg-dark text-white">
          <i class="fas fa-boxes"></i> Paqueteria
        </a>
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
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item active"><a class="nav-link" href="#">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" href="paqueteria.php">Paqueteria</a></li>
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
        <h1 class="mt-4" id="title"><i class="far fa-user"></i> Clientes</h1>
        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                  Agregar Cliente
                </div>
                <div class="card-body">
                  <form id="formClientes" method="post">
                    <div class="form">
                      <div class="form-group">
                        <label for="idCliente">Numero de Cliente</label>
                        <input type="hidden" class="form-control" id="idClienteEdit" name="idClienteEdit">
                        <input type="text" class="form-control" placeholder="Numero Cliente" id="idCliente" name="idCliente" required>
                      </div>
                      <div class="form-group">
                        <label for="cliente">Nombre del Cliente</label>
                        <input type="text" class="form-control" placeholder="Cliente" id="cliente" name="cliente" required>
                      </div>

                      <div id="btnRegistrar">
                        <input type="submit" name="registrarCliente" value="Terminar" class="btn btn-success btn-block">
                      </div>
                      <div class="row">
                        <div id="btnGroup" class="btn-group col col-sm-12" role="group" aria-label="Basic example">
                          <button type="submit" name="editar" class="btn btn-success">Actualizar</button>
                          <button type="button" class="btn btn-danger" id="btnEliminar" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
                          <button type="button" class="btn btn-warning" id="btnCancelar">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
          <div class="col-lg-8 col-sm-12">
            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="tablaCliente">
              <thead>
                <tr>
                  <th scope="col">No.Cliente</th>
                  <th scope="col">Cliente</th>
                  <th scope="col"></th>
                </tr>
              </thead>
            </table>
          </div>
      </div>
  </div>
  <div class="fixed-bottom">
    <?php $DBDashboard->status(); ?>
  </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Atencion!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Esta seguro de elimiar a este cliente</h3>
        <form method="post">
          <input type="hidden" name="idClienteDelete" id="idClienteDelete">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <button type="submit" name="eliminarCliente" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- Bootstrap JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Menu Toggle Script -->
  <script src="js/menuTogle.js" charset="utf-8"></script>
  <!--DATATABLES-->
  <script src="DataTables/datatables.min.js"></script>
  <script src="DataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="DataTables/Responsive/js/dataTables.responsive.min.js"></script>
  <script src="DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
  <!--SCRIPTS-->
  <script src="js/cliente.js"></script>



</body>

</html>
<?php
}else {
    header('location:../index.php');
}
 ?>
