<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menumaster extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    function index()
    {
        $this->load->view('master/header');
        $this->load->view('master/daftarmaster');
        $this->load->view('master/footer');
    }
}

/* End of file Menumaster.php */
