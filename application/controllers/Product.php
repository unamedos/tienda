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

        $data['listadoCategorias'] = $this->category_ml->listado();



        $data = array(
            'fk_categoria'      => $fk_category,
            'nombre'            => $nombre,
            'precio_unitario'   => $precio_unitario,
            'cantidad'          => $cantidad
        );

        $add = $this->product_ml->add($data);

        if ($add == TRUE) {
            redirect('product', 'refresh');
        } else {
            redirect('product', 'refresh');
        }
    }


    #METODO PARA EDITAR PRODUCTO
    function edit()
    {
        $id = $this->input->get('id');

        $row = $this->product_ml->get($id);


        $data['listado']  = $this->category_ml->listado();
        $data['row']                = $row;

        $this->load->view('template/header_view');
        $this->load->view('product/edit_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA ACTUALIZAR PRODUCTO
    function update()
    {
        $id                 = $this->input->post('id');
        $fk_category       = $this->input->post('fk_categoria');
        $nombre             = $this->input->post('nombre');
        $precio_unitario    = $this->input->post('precio_unitario');
        $cantidad           = $this->input->post('cantidad');


        $data = array(
            'id'                => $id,
            'fk_categoria'      => $fk_category,
            'nombre'            => $nombre,
            'precio_unitario'   => $precio_unitario,
            'cantidad'          => $cantidad
        );

        $update = $this->product_ml->update($data);

        if ($update == TRUE) {
            $this->session->set_flashdata('info', 'Datos modificados con exito.');
            redirect('product/edit?id=' . $id, 'refresh');
        } else {
            $this->session->set_flashdata('info', 'Error hubo un problema al modificar.');
            redirect('product/edit?id=' . $id, 'refresh');
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
