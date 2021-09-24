<?php
class Datos
{
  private $DBConexion;

  function __construct($Conexion){
    $this->DBConexion=$Conexion;
  }

  public function totalErrores(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM auditoria WHERE estatus = 'ERROR';");
    $sentencia->execute();
    $resultado = $sentencia->rowCount();

    if (!$resultado) {
		echo "0";
  	}else{
      echo $resultado;
  	}
  }

  public function tablaEmpleados(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM empleadoAlmacen");
    $sentencia->execute();
    $empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    if (!$empleados) {
		die("Error");
  	}else{
      echo  json_encode(array('data' => $empleados));
  	}
  }
  public function nuevoEmpleado(){
    $numero = $_POST['numeroCliente'];
    $nombre = $_POST['nombreEmpleado'];
    if (!empty($numero) && !empty($nombre)) {
      $query =('INSERT INTO empleadoAlmacen (numeroEmpleado, nombreEmpleado) VALUES (:numero, :nombre)');
      $consulta = $this->DBConexion->prepare($query);
      $consulta->bindParam(':numero',$numero);
      $consulta->bindParam(':nombre',$nombre);
      $consulta->execute();

      if ($consulta) {
        header("Location: ./empleados.php?status=1");
      }else{
        header("Location: ./empleados.php?status=2");
      }
    }
  }
  public function actualizarEmpleado(){
    $idEmpleado = $_POST['idEmpleado'];
    $numero = $_POST['numeroCliente'];
    $nombre = $_POST['nombreEmpleado'];
  }

  public function listaEmpleados(){
    $query = ('SELECT * FROM empleadoAlmacen');
    $consulta = $this->DBConexion->prepare($query);
    $consulta->execute();
    $listar = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if (!$listar) {
      echo "error";
    }else {
      foreach ($listar as $lista) {
        ?>
        <option value="<?php echo $lista['numeroEmpleado']; ?>"><?php echo $lista['numeroEmpleado']; ?></option>
        <?php
      }
    }

  }

}
