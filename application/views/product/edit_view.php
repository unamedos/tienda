<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Producto
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <form action="<?php echo base_url(); ?>product/update" method="POST" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Categorias</label>
                                <div class="col-sm-10">
                                    <select name="fk_categoria" class="form-control">
                                        <?php
                                        foreach ($listado as $row1) {
                                        ?>
                                            <option <?php if ($row->fk_categoria == $row1->id) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $row1->id; ?>"><?php echo $row1->nombre; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Stock</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="stock" value="<?php echo $row->stock; ?>" placeholder="Ingrese nombre Cantidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Precio Venta</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="precio_venta" value="<?php echo $row->precio_venta; ?>" placeholder="Ingrese nombre Cantidad">
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="javascript:history.back(1)" class="btn btn-default"> Atrás</a>
                            <button type="submit" class="btn btn-info pull-right">Modificar</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!--/.col (right) -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->