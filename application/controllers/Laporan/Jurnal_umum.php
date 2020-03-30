<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_umum extends CI_Controller {

    public $model = null;

    public function __construct()
    {
        parent::__construct();

        // Jurnal Umum Model

        $this->load->database();
    }
    public function index()
    {
        $this->read();
    }

    public function layout()
    {
        // Header
        $data['title'] = "Kinicheese Tea - Jurnal Umum";
        $data['breadcrumbs_title'] = "Jurnal Umum";
        $data['head'] = $this->load->view('layout/head', $data, TRUE);
        $data['header'] = $this->load->view('layout/header', NULL, TRUE);
        $data['sidebar_left'] = $this->load->view('layout/sidebar_left', NULL, TRUE);
        $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

        // Footer
        $data['sidebar_right'] = $this->load->view('layout/sidebar_right', NULL, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $data['scripts'] = $this->load->view('layout/scripts', NULL, TRUE);

        return $data;
    }

    public function create()
    {
        
    }
    public function read()
    {
        $data = $this->layout();
        $data['sub_breadcrumbs_title'] = "Jurnal Umum";
        $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

        // $data['rows'] = $this->model->read();
        $this->load->view('jurnal_umum_read_view', $data);
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
    }

}

/* End of file Jurnal_umum.php */

?>