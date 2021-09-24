<?php


$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "auditoria"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query = "SELECT * FROM clientes WHERE numeroCliente like'%".$search."%'";
    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result) ){
        $response[] = array("valueId"=>$row['id'],"value"=>$row['nombreCliente'],"label"=>$row['numeroCliente']);
    }

    echo json_encode($response);
}

if(isset($_POST['searchUM'])){
    $search = $_POST['searchUM'];

    $query = "SELECT * FROM paquetes WHERE UM like'%".$search."%'";
    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['idPaquete'],"label"=>$row['UM']);
    }

    echo json_encode($response);
}

exit;
?>
