<?php
class DBDashboard
{
  private $DBConexion;

  function __construct($Conexion){
    $this->DBConexion=$Conexion;
  }

  public function status(){
    if(isset($_GET["status"])){
      if($_GET["status"] === "1"){
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Registro Correcto</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      } elseif ($_GET["status"] === "2") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> No se puede proceder hasta que llenes los campos requeridos.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "3") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Registro Actualizado.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "4") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Registro eliminado correctamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "5") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Algo salio mal..
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "6") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Este paquete ya ha sido embarcado.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "7") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Este paquete no existe.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "8") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Paquete embarcado correctamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "9") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Este paquete ya a sido auditado
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "10") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> No se a podido auditar, puede que el paquete no este registrado.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "11") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Este paquete ya se registro.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }elseif ($_GET["status"] === "12") {
        ?>
        <div class="row">
          <div class="col-sm-4 offset-md-8">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> Este cliente ha sido dado de alta.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php
      }
    }
  }

  public function nuevaAuditoria(){
    $fecha = $_POST['fecha'];
    $idPaquete = $_POST['idPaquete'];
    $UM = $_POST['UM'];
    $estatus = $_POST['estatus'];
    $comentarios = $_POST['comentarios'];
    $pieza = $_POST['piezas'];
    $empaco = $_POST['empaco'];
    $surtio = $_POST['surtio'];

    $sentencia = $this->DBConexion->prepare("SELECT * FROM auditoria WHERE UM=:UM;");
    $sentencia->bindParam(':UM',$UM);
    $sentencia->execute();
    if($sentencia -> rowCount() > 0){
      header("Location: ./auditar.php?status=9");
    }else {
      if (!empty($fecha) &&
          !empty($idPaquete) &&
          !empty($UM)&&
          !empty($estatus)) {
            $query=('INSERT INTO auditoria(fecha,
                                          idPaquete,
                                          UM,
                                          estatus,
                                          comentarios,
                                          pieza,
                                          empaco,
                                          surtio
                                        )VALUES(:fecha,:idPaquete,:UM,:estaus,:comentarios,:pieza,:empaco,:surtio);');
            $consulta = $this->DBConexion->prepare($query);
            $consulta->bindParam(':fecha',$fecha);
            $consulta->bindParam(':idPaquete',$idPaquete);
            $consulta->bindParam(':UM',$UM);
            $consulta->bindParam(':estaus',$estatus);
            $consulta->bindParam(':comentarios',$comentarios);
            $consulta->bindParam(':pieza',$pieza);
            $consulta->bindParam(':empaco',$empaco);
            $consulta->bindParam(':surtio',$surtio);
            $consulta->execute();

            if ($consulta) {
              header("Location: ./auditar.php?status=1");
            }else{
              header("Location: ./auditar.php?status=10");
            }
      }
      else {
        header("Location: ./auditar.php?status=10");
      }
    }
  }

  public function tablaAuditoria(){
    $sentencia = $this->DBConexion->prepare("SELECT
           auditoria.fecha,
           paquetes.numCliente,
           paquetes.nombreCliente,
           paquetes.referencia,
           paquetes.UM,
           paquetes.entrega,
           auditoria.estatus,
           auditoria.comentarios,
           auditoria.pieza,
           auditoria.empaco,
           auditoria.surtio
           FROM auditoria INNER JOIN paquetes ON paquetes.idPaquete = auditoria.idPaquete;");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
		die("Error");
  	}else{
      echo  json_encode(array('data' => $resultado));
  	}
  }

  public function nuevoPaquete(){
      $fecha = $_POST['fecha'];
      $id = $_POST['id'];
      $idCliente = $_POST['idCliente'];
      $cliente = $_POST['cliente'];
      $referencia = $_POST['referencia'];
      $tipo = $_POST['tipo'];
      $UM = $_POST['UM'];
      $entrega = $_POST['entrega'];

      $sentencia = $this->DBConexion->prepare("SELECT * FROM paquetes WHERE UM=:UM;");
      $sentencia->bindParam(':UM',$UM);
      $sentencia->execute();
      if($sentencia -> rowCount() > 0){
        header("Location: ./paqueteria.php?status=11");
      }else {
        if (!empty($fecha) &&
            !empty($id) &&
            !empty($idCliente) &&
            !empty($cliente) &&
            !empty($referencia) &&
            !empty($tipo) &&
            !empty($UM)&&
            !empty($entrega)) {
              $query=('INSERT INTO paquetes(fecha,
                                            idCliente,
                                            numCliente,
                                            nombreCliente,
                                            referencia,
                                            UM,
                                            tipo,
                                            entrega
                                          )VALUES(:fecha,:id,:numeroCliente,:cliente,:referencia,:UM,:tipo,:entrega);');
              $consulta = $this->DBConexion->prepare($query);
              $consulta->bindParam(':fecha',$fecha);
              $consulta->bindParam(':id',$id);
              $consulta->bindParam(':numeroCliente',$idCliente);
              $consulta->bindParam(':cliente',$cliente);
              $consulta->bindParam(':referencia',$referencia);
              $consulta->bindParam(':tipo',$tipo);
              $consulta->bindParam(':UM',$UM);
              $consulta->bindParam(':entrega',$entrega);
              $consulta->execute();

              if ($consulta) {
                ?>
                <script type="text/javascript">

                </script>
                <?php
                header("Location: ./paqueteria.php?status=1");
              }else{
                header("Location: ./paqueteria.php?status=2");
              }
        }
        else {
          header("Location: ./paqueteria.php?status=2");
        }
      }



  }

  public function actualizarRegistro(){

        $estatus = $_POST['estatus'];
        $comentario = $_POST['comentarios'];
        $pieza = $_POST['piezas'];
        $empaque = $_POST['empaco'];
        $surtido = $_POST['surtio'];
        $UM = $_POST['UM'];

        if (!empty($UM) &&
            !empty($estatus))
            {
              $query = ('UPDATE auditoria SET estatus=:esatus,
                                              comentarios=:comentarios,
                                              pieza=:pieza,
                                              empaco=:empaque,
                                              surtio=:surtido
                                              WHERE UM=:UM');
              $consulta = $this->DBConexion->prepare($query);
              $consulta->bindParam(':esatus',$estatus);
              $consulta->bindParam(':comentarios',$comentario);
              $consulta->bindParam(':pieza',$pieza);
              $consulta->bindParam(':empaque',$empaque);
              $consulta->bindParam(':surtido',$surtido);
              $consulta->bindParam(':UM',$UM);
              $consulta->execute();

              if ($consulta) {
                header("Location: ./auditar.php?status=3");
              }else{
                header("Location: ./auditar.php?status=2");
              }
        }
  }

  public function eliminarRegistro(){
        $idAuditoria = $_POST['idAuditoriaEliminar'];
        $query = "DELETE FROM auditoria WHERE id=:id";
        $consulta = $this->DBConexion->prepare($query);
        $consulta->bindParam(':id',$idAuditoria);
        $consulta->execute();
          if ($consulta) {
              header("Location: ./registros.php?status=4");
          }else{
            header("Location: ./registros.php?status=5");
          }
  }

  public function nuevoCliente(){
    $numeroCliente = $_POST['idCliente'];
    $nombreCliente = $_POST['cliente'];
    $sentencia = $this->DBConexion->prepare("SELECT * FROM clientes WHERE numeroCliente=:numeroCliente;");
    $sentencia->bindParam(':numeroCliente',$numeroCliente);
    $sentencia->execute();
    if($sentencia -> rowCount() > 0){
      header("Location: ./clientes.php?status=12");
    }else {
      $query=('INSERT INTO clientes(numeroCliente,nombreCliente)VALUES(:numeroCliente,:nombreCliente);');
              $consulta = $this->DBConexion->prepare($query);
              $consulta->bindParam(':numeroCliente',$numeroCliente);
              $consulta->bindParam(':nombreCliente',$nombreCliente);
              $consulta->execute();

              if ($consulta) {
                header("Location: ./clientes.php?status=1");
              }else{
                header("Location: ./clientes.php?status=2");
              }
    }
  }

  public function editarCliente(){
    $id = $_POST['idClienteEdit'];
    $numeroCliente = $_POST['idCliente'];
    $nombreCliente = $_POST['cliente'];

    $query=('UPDATE clientes SET numeroCliente=:numeroCliente, nombreCliente=:cliente WHERE id = :id');
            $consulta = $this->DBConexion->prepare($query);
            $consulta->bindParam(':id',$id);
            $consulta->bindParam(':numeroCliente',$numeroCliente);
            $consulta->bindParam(':cliente',$nombreCliente);
            $consulta->execute();

            if ($consulta) {
              header("Location: ./clientes.php?status=3");
            }else{
              header("Location: ./clientes.php?status=5");
            }
  }
  public function eliminarCliente(){
    $id = $_POST['idClienteDelete'];
    $query=('DELETE FROM clientes WHERE id=:id');
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    if ($consulta) {
      header("Location: ./clientes.php?status=4");
    }else{
      header("Location: ./clientes.php?status=5");
    }
  }

  public function tablaCliente(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM clientes;");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
    die("Error");
    }else{
      echo  json_encode(array('data' => $resultado));
    }
  }

  public function tablaEmbarquesPotosinos(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM paquetes WHERE entrega = 'POTOSINOS';");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
    die("Error");
    }else{
      echo  json_encode(array('data' => $resultado));
    }
  }

  public function embarcarPotosinos(){
    $estatusEmbarque = $_POST['estatusEmbarque'];
    $UM = $_POST['umEmbarque'];

    $sentencia = $this->DBConexion->prepare("SELECT * FROM paquetes WHERE UM = :UM;");
    $sentencia->bindParam(':UM',$UM);
    $sentencia->execute();
    $row = $sentencia->fetch(PDO::FETCH_ASSOC);
    if ($row['embarque'] == 'EMBARCADO') {
      header("Location: ./embarquePotosinos.php?status=6");
      exit;
    }else {
      header("Location: ./embarquePotosinos.php?status=7");
    }
    if ($sentencia) {
      $query=('UPDATE paquetes SET embarque = :estatusEmbarque WHERE UM = :UM');
              $consulta = $this->DBConexion->prepare($query);
              $consulta->bindParam(':estatusEmbarque',$estatusEmbarque);
              $consulta->bindParam(':UM',$UM);
              $consulta->execute();
              if ($consulta) {
                header("Location: ./embarquePotosinos.php?status=8");
              }
    }

  }

  public function tablaPaqueteria(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM paquetes;");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
    die("Error");
    }else{
      echo  json_encode(array('data' => $resultado));
    }
  }

  public function embarcarPaquetexpress(){
    $estatusEmbarque = $_POST['estatusEmbarque'];
    $UM = $_POST['umEmbarque'];

    $sentencia = $this->DBConexion->prepare("SELECT * FROM paquetes WHERE UM = :UM;");
    $sentencia->bindParam(':UM',$UM);
    $sentencia->execute();
    $row = $sentencia->fetch(PDO::FETCH_ASSOC);
    if ($row['embarque'] == 'EMBARCADO') {
      header("Location: ./embarquePaquetexpress.php?status=6");
      exit;
    }else {
      header("Location: ./embarquePaquetexpress.php?status=7");
    }
    if ($sentencia) {
      $query=('UPDATE paquetes SET embarque = :estatusEmbarque WHERE UM = :UM');
              $consulta = $this->DBConexion->prepare($query);
              $consulta->bindParam(':estatusEmbarque',$estatusEmbarque);
              $consulta->bindParam(':UM',$UM);
              $consulta->execute();
              if ($consulta) {
                header("Location: ./embarquePaquetexpress.php?status=8");
              }
    }

  }

  public function tablaEmbarquesPaquete(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM paquetes WHERE entrega = 'PAQUETEXPRESS';");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
    die("Error");
    }else{
      echo  json_encode(array('data' => $resultado));
    }
  }


}
