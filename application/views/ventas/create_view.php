<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ventas
            <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">Tipo de Comprobante:</label>
                                        <select name="comprobantes" id="comprobantes" class="form-control" required>
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($tipocomprobantes as $tipocomprobante) : ?>
                                                <?php $datacomprobante = $tipocomprobante->id . "*" . $tipocomprobante->cantidad . "*" . $tipocomprobante->iva . "*" . $tipocomprobante->serie; ?>
                                                <option value="<?php echo $datacomprobante; ?>"><?php echo $tipocomprobante->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="hidden" id="idcomprobante" name="idcomprobante">
                                        <input type="hidden" id="iva" name="iva">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="">Nro de serie:</label>
                                        <input type="text" class="form-control" name="serie" id="serie" readonly>
                                    </div><!-- /input-group -->

                                    <div class="col-md-5">
                                        <label for="">Nro de control</label>
                                        <input type="text" class="form-control" name="numero" id="numero" readonly>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">Cliente:</label>
                                        <div class="input-group">
                                            <input type="hidden" id="idCliente" name="idCliente">
                                            <input type="text" class="form-control" disabled="disabled" name="infoCliente" id="Cliente">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary btn-flat" type="button" data-toggle="modal" data-target="#modal-clientes">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="">Producto:</label>
                                        <input type="text" class="form-control" id="producto" placeholder="Ingrese Nombre de producto">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">&nbsp;</label>
                                        <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                    </div>
                                </div>
                                <div></div>
                                <table id="tbventas" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>

                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Stock Max.</th>
                                            <th>Cantidad</th>
                                            <th>total</th>
                                            <th>Opcion</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Subtotal:</span>
                                            <input type="text" class="form-control" placeholder="Username" name="subtotal" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">iva</span>
                                            <input type="text" class="form-control" placeholder="Username" name="iva2" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Total:</span>
                                            <input type="text" class="form-control" placeholder="Username" name="total" readonly="readonly">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-venta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informacion de la orden</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button id="btn-cmodal" type="button" class="btn btn-danger pull-left btn-cerrar-imp" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-flat btn-print"><span class="fa fa-print"></span> Imprimir</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-clientes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Listado de Clientes</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_array($listado) || is_object($listado)) : ?>
                                <?php foreach ($listado as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->nombre; ?></td>
                                        <td><?php echo $row->apellido; ?></td>
                                        <td><?php echo $row->cedula; ?></td>
                                        <?php $datacliente = $row->id . "_" . $row->nombre . "_" . $row->apellido . "_" . $row->cedula; ?>
                                        <td>

                                            <button type="button" class="btn btn-success btn-check" value="<?php echo $datacliente; ?>"><span class="fa fa-check"></span></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-cmodal" type="button" class="btn btn-danger pull-left btn-cerrar-imp" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-flat btn-print"><span class="fa fa-print"></span> Imprimir</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>