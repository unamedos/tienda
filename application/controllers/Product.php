<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //se comunica con el modelo
        $this->load->model('category_ml');
        $this->load->model('product_ml');
        $this->load->model('client_ml');
    }

    #METODO PARA LISTAR TODAS LAS CATEGORIAS
    function index()
    {
        $data['listado'] = $this->product_ml->listado();

        $this->load->view('template/header_view');
        $this->load->view('product/index_view', $data);
        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }

    #METODO PARA CREAR PRODUCTO
    function create()
    {
        $data['listadoCategorias'] = $this->category_ml->listado();

        $this->load->view('template/header_view');
        $this->load->view('product/create_view', $data);
        $this->load->view('product/edit_view', $data);
        $this->load->view('lib/lib_js');
    }

    function show()
    {
        $id = $this->input->get('id');

        $row = $this->product_ml->get($id);

        $data['row'] = $row;
        $this->load->view('template/header_view');
        $this->load->view('product/show_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA GUARDAR CATEGORIA
    function store()
    {
        $fk_category        = $this->input->post('fk_categoria');
        $nombre             = $this->input->post('nombre');
        $precio_unitario    = $this->input->post('precio_unitario');
        $cantidad           = $this->input->post('cantidad');
        $stock              = $this->input->post('stock');
        $precio_venta       = $this->input->post('precio_venta');



        #para validar
        $this->form_validation->set_rules("fk_categoria", "Categoria", "required");
        $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[productos.nombre]");
        $this->form_validation->set_rules("precio_unitario", "Precio Unitario", "required");
        $this->form_validation->set_rules("cantidad", "Cantidad", "required");
        $this->form_validation->set_rules("stock", "Stock", "required");
        $this->form_validation->set_rules("precio_venta", "Precio Venta", "required");


        if ($this->form_validation->run()) {

            $data = array(
                'fk_categoria'      => $fk_category,
                'nombre'            => $nombre,
                'precio_unitario'   => $precio_unitario,
                'cantidad'          => $cantidad,
                'stock'             => $stock,
                'precio_venta'      => $precio_venta
            );

            $add = $this->product_ml->add($data);

            if ($add == TRUE) {
                redirect('product', 'refresh');
            } else {
                redirect('product', 'refresh');
            }
        } else {

            $this->create();
        }
    }


    #METODO PARA EDITAR PRODUCTO
    function edit()
    {
        $id = $this->input->get('id');

        $row = $this->product_ml->get($id);


        $data['listado']  = $this->category_ml->listado();
        $data['row']      = $row;

        $this->load->view('template/header_view');
        $this->load->view('product/edit_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA ACTUALIZAR PRODUCTO
    function update()
    {
        $id                 = $this->input->post('id');
        $fk_category        = $this->input->post('fk_categoria');
        $nombre             = $this->input->post('nombre');
        $precio_unitario    = $this->input->post('precio_unitario');
        $cantidad           = $this->input->post('cantidad');
        $stock              = $this->input->post('stock');
        $precio_venta       = $this->input->post('precio_venta');

        $productoActual = $this->product_ml->get($id);

        if ($nombre == $productoActual->nombre) {
            $is_unique = '';
        } else {
            $is_unique = '|is_unique[productos.nombre]';
        }

        #para validar
        $this->form_validation->set_rules("id", "id", "required");
        $this->form_validation->set_rules("fk_categoria", "Categoria", "required");
        $this->form_validation->set_rules("nombre", "Nombre", "required" . $is_unique);
        $this->form_validation->set_rules("precio_unitario", "Precio Unitario", "required");
        $this->form_validation->set_rules("cantidad", "Cantidad", "required");
        $this->form_validation->set_rules("stock", "Stock", "required");
        $this->form_validation->set_rules("precio_venta", "Precio Venta", "required");

        if ($this->form_validation->run()) {

            $data = array(
                'id'                => $id,
                'fk_categoria'      => $fk_category,
                'nombre'            => $nombre,
                'precio_unitario'   => $precio_unitario,
                'cantidad'          => $cantidad,
                'stock'             => $stock,
                'precio_venta'      => $precio_venta
            );

            $update = $this->product_ml->update($data);

            if ($update == TRUE) {
                $this->session->set_flashdata('info', 'Datos modificados con exito.');
                redirect('product/edit?id=' . $id, 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Error hubo un problema al modificar.');
                redirect('product/edit?id=' . $id, 'refresh');
            }
        } else {

            $row                = $this->product_ml->get($id);
            $data['row']        = $row;
            $data['listado']    = $this->category_ml->listado();

            $this->load->view('template/header_view');
            $this->load->view('product/edit_view', $data);
            $this->load->view('lib/lib_js');
        }
    }


    #METODO PARA ELIMINAR producto
    function delete()
    {
        $id = $this->input->get('id');

        $delete = $this->product_ml->delete($id);

        $this->session->set_flashdata('info', 'Se elimino correctamente.');
        redirect('product', 'refresh');
    }
}
