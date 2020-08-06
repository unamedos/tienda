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
                    <form action="<?php echo base_url(); ?>category/update" method="POST" class="form-horizontal">
                        <div class="box-body">

                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre de Producto</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>" placeholder="Ingrese nombre categoria">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default">Atras</button>
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