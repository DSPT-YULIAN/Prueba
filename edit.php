<?php 
    include('conexion.php');

    if(isset($_GET['Id'])) {
        $id = $_GET['Id'];
        $consulta = "SELECT * FROM producto WHERE Id = $id";
        $result = mysqli_query($conn, $consulta);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            
            $nombre = $row['Nombre_producto'];
            $ref = $row['Referencia'];
            $precio = $row['Precio'];
            $peso = $row['Peso'];
            $cat = $row['Categoria'];
            $stock = $row['Stock'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['Nombre_producto'];
        $referencia= $_POST['Referencia'];
        $precio = $_POST['Precio'];
        $peso = $_POST['Peso'];
        $cat = $_POST['Categoria'];
        $stock = $_POST['Stock'];

        $consulta = "UPDATE producto set Nombre_producto = '$nombre', Referencia = '$referencia', Precio = '$precio', Peso = '$peso', Categoria = '$cat', Stock = '$stock' WHERE Id = $id";
        mysqli_query($conn, $consulta);

        $_SESSION['message'] = 'producto actualizado con exito';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
?>

<?php include('incluides/header.php')?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="Nombre_producto" class="form-control" placeholder="actualiza el nombre">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Referencia"
                        class="form-control" placeholder="referencia">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="Precio" 
                         class="form-control" placeholder="precio de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Peso" 
                         class="form-control" placeholder="peso de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Categoria" 
                        class="form-control" placeholder="categoria de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Stock" 
                        class="form-control" placeholder="cantidad de stock">
                    </div>
                        <br>
                        
                    

                        <button type="submit" class="btn btn-success btn-block" name="actualizar" value="actualizar">Actualizar</button>

                        
                </form>
            </div>
        </div>
    </div>
</div>
