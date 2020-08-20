<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //se comunica con el modelo
    }
    function index()
    {

        $this->load->view('template/header_view');
        $this->load->view('template/aside_view');

        $this->load->view('ventas/index_view');
        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }


    function create()
    {

        $this->load->view('template/header_view');
        $this->load->view('ventas/create_view');
        $this->load->view('lib/lib_js');
    }

    function show()
    {
        $this->load->view('template/header_view');
        $this->load->view('ventas/show_view');
        $this->load->view('lib/lib_js');
    }
}
