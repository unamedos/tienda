<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //se comunica con el modelo
        $this->load->model('category_ml');
        $this->load->model('product_ml');
        $this->load->model('client_ml');
    }

    #METODO PARA LISTAR TODOS LAS CATEGORIAS
    function index()
    {
        $data['listado'] = $this->category_ml->listado();


        $this->load->view('template/header_view');
        $this->load->view('category/index_view', $data);

        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }

    #METODO PARA CREAR CATEGORIA
    function create()
    {
        $this->load->view('template/header_view');
        $this->load->view('category/create_view');
        $this->load->view('lib/lib_js');
    }
    function show()
    {
        $id = $this->input->get('id');
        $row = $this->category_ml->get($id);
        $data['row'] = $row;
        $data['listadoProductos'] = $this->product_ml->listadoCategoryProduct($id);
        $this->load->view('template/header_view');
        $this->load->view('category/show_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA GUARDAR CATEGORIA
    function store()
    {
        $categoria   = $this->input->post('categoria');
        $search = $this->category_ml->searchCategory($categoria);
        if ($search == TRUE) {
            $this->session->set_flashdata('info', 'Esta categoria ya existe');
            redirect('category/create', 'refresh');
        } else {
            $data = array(
                'nombre'  => $categoria
            );
            $add = $this->category_ml->add($data);
            if ($add == TRUE) {
                redirect('category', 'refresh');
            } else {
                redirect('category', 'refresh');
            }
        }
    }

    #METODO PARA EDITAR CATEGORIA
    function edit()
    {
        $id = $this->input->get('id');
        $row = $this->category_ml->get($id);
        $data['row'] = $row;
        $this->load->view('template/header_view');
        $this->load->view('category/edit_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA ACTUALIZAR CATEGORIA
    function update()
    {
        $id     = $this->input->post('id');
        $nombre = $this->input->post('nombre');

        $data = array(
            'id'            => $id,
            'nombre'        => $nombre
        );

        $update = $this->category_ml->update($data);

        if ($update == TRUE) {
            $this->session->set_flashdata('info', 'Datos modificados con exito.');
            redirect('category', 'refresh');
        } else {
            $this->session->set_flashdata('info', 'Error hubo un problema al modificar.');
            redirect('category', 'refresh');
        }
    }

    #METODO PARA ELIMINAR CATEGORIA
    function delete()
    {
        $id = $this->input->get('id');

        $delete = $this->category_ml->delete($id);

        $this->session->set_flashdata('info', 'Se elimino correctamente.');
        redirect('category', 'refresh');
    }
}
