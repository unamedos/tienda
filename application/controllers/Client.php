<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //se comunica con el modelo

        $this->load->model('client_ml');
    }

    #METODO PARA LISTAR TODOS LOS CLIENTES
    function index()
    {
        $data['listado'] = $this->client_ml->listado();
        $this->load->view('template/header_view');
        $this->load->view('client/index_view', $data);
        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }

    #METODO PARA CREAR CLIENTES
    function create()
    {
        $data['listadoClientes'] = $this->client_ml->listado();

        $this->load->view('template/header_view');
        $this->load->view('client/create_view', $data);
        $this->load->view('lib/lib_js');
    }

    function show()
    {
        $id = $this->input->get('id');

        $row = $this->client_ml->get($id);

        $data['row'] = $row;

        $this->load->view('template/header_view');
        $this->load->view('client/show_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA GUARDAR CLIENTES
    function store()
    {
        $nombre             = $this->input->post('nombre');
        $apellido           = $this->input->post('apellido');
        $cedula             = $this->input->post('cedula');
        $direccion          = $this->input->post('direccion');
        $telefono           = $this->input->post('telefono');
        $correo             = $this->input->post('correo');

        $search = $this->client_ml->searchClientGet($cedula);

        if ($search == TRUE) {

            $this->session->set_flashdata('info', 'Esta cliente ya existe');
            redirect('client/create', 'refresh');
        } else {

            $data = array(
                'nombre'         => $nombre,
                'apellido'       => $apellido,
                'cedula'         => $cedula,
                'direccion'      => $direccion,
                'telefono'       => $telefono,
                'correo'         => $correo,
                'fecha_registro' => date('Y-m-d H:m:s')

            );

            $add = $this->client_ml->add($data);

            if ($add == TRUE) {
                redirect('client/create', 'refresh');
            } else {
                redirect('client/create', 'refresh');
            }
        }
    }

    #METODO PARA EDITAR CLIENTE5
    function edit()
    {
        $id = $this->input->get('id');
        $row = $this->client_ml->get($id);
        $data['listadoClient']  = $this->client_ml->listado();
        $data['row'] = $row;
        $this->load->view('template/header_view');
        $this->load->view('client/edit_view', $data);
        $this->load->view('lib/lib_js');
    }

    #METODO PARA ACTUALIZAR CLIENTES
    function update()
    {
        $id                 = $this->input->post('id');
        $nombre             = $this->input->post('nombre');
        $apellido           = $this->input->post('apellido');
        $cedula             = $this->input->post('cedula');
        $direccion          = $this->input->post('direccion');
        $telefono           = $this->input->post('telefono');
        $correo             = $this->input->post('correo');

        $data = array(
            'id'             => $id,
            'nombre'         => $nombre,
            'apellido'       => $apellido,
            'cedula'         => $cedula,
            'direccion'      => $direccion,
            'telefono'       => $telefono,
            'correo'         => $correo
        );

        $update = $this->client_ml->update($data);

        if ($update == TRUE) {
            $this->session->set_flashdata('info', 'Datos modificados con exito.');
            redirect('client', 'refresh');
        } else {
            $this->session->set_flashdata('info', 'Error hubo un problema al modificar.');
            redirect('client', 'refresh');
        }
    }



    #METODO PARA ELIMINAR producto
    function delete()
    {
        $id = $this->input->get('id');
        $delete = $this->client_ml->delete($id);
        $this->session->set_flashdata('info', 'Se elimino correctamente.');
        redirect('client', 'refresh');
    }
}
