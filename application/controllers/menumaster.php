<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controllername extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $this->load->view('master/header');
        $this->load->view('master/daftarmaster');
        $this->load->view('master/footer');
    }
}

/* End of file Controllername.php */
