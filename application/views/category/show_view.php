<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $row->nombre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>category">Categorias</a></li>
            <li class="active">Listado</li>
    </section>
    <!-- Main content -->
    <section class="invoice">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalpro = 0;
                        if (is_array($listadoProductos) || is_object($listadoProductos)) {
                            foreach ($listadoProductos as $pro) {
                                $multi = $pro->precio_unitario * $pro->cantidad;
                                #$totalpro = $totalpro + $multi;
                                $totalpro += $multi;
                                echo "<tr>";
                                echo "<td>" . $pro->nombre . "</td>";
                                echo "<td>" . $pro->precio_unitario . "</td>";
                                echo "<td>" . $pro->cantidad . "</td>";
                                echo "<td>" . $multi . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<td><center>No existen productos para esta categoria</center></td>";
                        }
                        echo $totalpro;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->

    </section>


</div>