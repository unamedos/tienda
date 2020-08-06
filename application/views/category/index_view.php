<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Listado Categorias
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="<?php echo base_url(); ?>category">Categorias</a></li>
      <li class="active">Listado</li>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Categoria</th>
                  <th>Nombre</th>

                </tr>
              </thead>
              <tbody>
                <?php
                if (is_array($listado) || is_object($listado)) {
                  foreach ($listado as $row) {
                    $rutaVer      = base_url() . "category/show?id=" . $row->id;
                    $rutaEdit     = base_url() . "category/edit?id=" . $row->id;
                    $rutaEliminar = base_url() . "category/delete?id=" . $row->id;

                    echo "<tr>";
                    echo "<td>" . $row->nombre . "</td>";
                    echo "
                                    <td>
                                        <a href='" . $rutaVer . "' class='ver'><i class='fa fa-eye'></i></a>
                                        <a href='" . $rutaEdit . "' class='editar'><i class='fa fa-pencil'></i></a>
                                        <a href='" . $rutaEliminar . "' class='eliminar'><i class='fa fa-remove'></i></a>
                                    </td>";
                    echo "</tr>";
                  }
                } else {
                  #NO EXISTEN REGISTROS
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->