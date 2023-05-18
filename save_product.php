<?php

include ('conexion.php');

if (isset($_POST['save_product'])) {


$nombre = $_POST['Nombre_producto'];
$ref = $_POST['Referencia'];
$valor = $_POST['Precio'];
$peso = $_POST['Peso'];
$cat = $_POST['Categoria'];
$stock = $_POST['Stock'];
$fecha = $_POST['Fecha_creacion'];


$query = "INSERT INTO producto(Nombre_producto, Referencia, Precio, Peso, Categoria, Stock) VALUES ('$nombre', '$ref', '$valor', '$peso', '$cat', '$stock')";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("query failed");
}

$_SESSION['message'] = 'producto guardado exitosamente';
$_SESSION['message_type'] = 'success';

header("location: index.php");
}

?>


