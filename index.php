<?php include('conexion.php')?>

<?php include('incluides/header.php')?>


<div class="container p-4">

    <div class="row">
       <div class="col-md-4">
        
       <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" 
            role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_product.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="Nombre_producto" class="form-control" placeholder="nombre de producto" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Referencia" class="form-control" placeholder="referencia de producto" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Precio" class="form-control" placeholder="precio de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Peso" class="form-control" placeholder="peso de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Categoria" class="form-control" placeholder="categoria de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="Stock" class="form-control" placeholder="stock de producto">
                    </div>

                    <div class="form-group">
                        <input type="date" name="Fecha_creacion" class="form-control" placeholder="creacion de producto">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="save_product" value="Guardar">
                
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM PRODUCTO";
                    $result_product = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_array($result_product)){ ?>
                    
                        <tr>
                            
                            <td><?php echo $row['Nombre_producto'] ?></td>
                            <td><?php echo $row['Referencia'] ?></td>
                            <td><?php echo $row['Precio'] ?></td>
                            <td><?php echo $row['Peso'] ?></td>
                            <td><?php echo $row['Categoria'] ?></td>
                            <td><?php echo $row['Stock'] ?></td>
                            <td><?php echo $row['Fecha_creacion'] ?></td>
                            <td>
                             

                                <a href="edit.php?id=<?php echo $row['Id']?>"class="btn btn-success">
                                    edit
                                </a>

                        
                                 <a href="delete_product.php?id=<?php echo $row['Id']?>" class="btn btn-danger">
                                    delete
                                </a>
                                    
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    
</div>





