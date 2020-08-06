<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Cliente
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">


                    <form action="<?php echo base_url(); ?>client/update" method="POST" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>" placeholder="Ingrese nombre cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="apellido" value="<?php echo $row->apellido; ?>" placeholder="Ingrese apellido">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cedula</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="cedula" value="<?php echo $row->cedula; ?>" placeholder="Ingrese cedula">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="direccion" value="<?php echo $row->direccion; ?>" placeholder="Ingrese direccion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $row->telefono; ?>" placeholder="Ingrese telefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="correo" value="<?php echo $row->correo; ?>" placeholder="Ingrese correo">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-default">Atras</button>
                            <button type="submit" class="btn btn-success pull-right">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>