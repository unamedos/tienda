<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Categorias</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url(); ?>category"><i class="fa fa-circle-o"></i> Listado</a></li>
      <li><a href="<?php echo base_url(); ?>category/create"><i class="fa fa-circle-o"></i> Crear Categoria</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-pie-chart"></i>
      <span>Productos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url(); ?>product"><i class="fa fa-circle-o"></i> Listado</a></li>
      <li><a href="<?php echo base_url(); ?>product/create"><i class="fa fa-circle-o"></i> Agregar Producto</a></li>
    </ul>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-pie-chart"></i>
      <span>Clientes</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url(); ?>client"><i class="fa fa-circle-o"></i> Listado</a></li>
      <li><a href="<?php echo base_url(); ?>client/create"><i class="fa fa-circle-o"></i> Agregar Clientes</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-pie-chart"></i>
      <span>Ventas</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">

      <li><a href="<?php echo base_url(); ?>ventas/show"><i class="fa fa-circle-o"></i> Ventas</a></li>


  </li>
</ul>
</section>
<!-- /.sidebar -->
</aside>