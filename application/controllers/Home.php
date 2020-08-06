<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct () 
    {
        parent::__construct();
    }

    function index()
	{ 
        $this->load->view('template/header_view');
        $this->load->view('template/content_view');
        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }
}

?>
