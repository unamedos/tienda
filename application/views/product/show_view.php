<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>category">Categorias</a></li>
            <li class="active">Listado</li>
    </section>
    <!-- Main content -->
    <section class="invoice">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <form action="" method="POST" class="form-horizontal">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Categorias</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" readonly value="<?php echo $row->categoria; ?>" placeholder="Ingrese nombre producto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre de Producto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>" placeholder="Ingrese nombre producto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Precio Unitario</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="precio_unitario" value="<?php echo $row->precio_unitario; ?>" placeholder="Ingrese Precio Unitario">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="cantidad" value="<?php echo $row->cantidad; ?>" placeholder="Ingrese nombre Cantidad">
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->

    </section>


</div>