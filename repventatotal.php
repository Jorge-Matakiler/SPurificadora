<!DOCTYPE html>
<html lang="esp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Venta</title>
    <link rel="stylesheet" type="text/css" href="DiseñoPuri.css">
  </head>
  <body>
    
    <h2></h2>
<h1><br> Reporte De Venta Total</h1>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="Calculadora.php">Calculadora de venta</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Purificadora.php">Registro de compra</a></li>
            <li><a class="dropdown-item" href="stock.php">Articulos(Stock)</a></li>
            <li><a class="dropdown-item" href="venta.php">Ventas</a></li>
          </ul>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu">
           <li><a class="dropdown-item" href="repganancias.php">Ganancias</a></li>
            <li><a class="dropdown-item" href="repventatotal.php">Venta Total</a></li>          
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div >
      <form action="repganancias.php" method="GET">
    
                            <div class="row">
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label><b>Del Día</b></label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b> Hasta  el Día</b></label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b></b></label> <br>
                                      <button type="submit" class="btn btn-danger">PDF</button>
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                        </form>



                    <table class="table table-striped" id= "table_id">
                            <thead>
                            <tr class="bg-white">
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Marca</th>
                            <th>Tipo</th>
                            <th>Total</th>
                              
                                </tr>
                            </thead>

                       <?php 
                       require("conexion.php");
                      

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT ventas.Ventas_Id, ventas.Fecha, ventas.Cantidad, ventas.Marca, ventas.Tipo, ventas.Total FROM ventas WHERE Fecha BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($conexion, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $fila)
                                        {
                                            ?>
                                            <tr>
                                            <td><?php echo $fila['Fecha']; ?></td>
                                            <td><?php echo $fila['Cantidad']; ?></td>
                                            <td><?php echo $fila['Marca']; ?></td>
                                            <td><?php echo $fila['Tipo']; ?></td>
                                            <td><?php echo $fila['Total']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                      
                                         <tr>
                                         <td><?php  echo "No se encontraron resultados"; ?></td>
                                  <?php
                                    }
                                }
                            ?>                          

  </div>

  </body>


</html>