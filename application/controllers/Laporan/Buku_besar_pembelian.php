<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_besar_pembelian extends CI_Controller
{

    public $model = null;

    public function __construct()
    {
        parent::__construct();

        // Jurnal Umum Model
        $this->load->model('buku_besar_model');
    }
    public function index()
    {
        $this->read();
    }

    public function layout()
    {
        // Header
        $data['title'] = "Kinicheese Tea - Buku Besar";
        $data['breadcrumbs_title'] = "Buku Besar Pembelian";
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
        if (isset($_POST['keterangan'], $_POST['id_transaksi'])) {

            $this->buku_besar_model->update_keterangan($_POST['id_transaksi'], $_POST['keterangan']);
        }

        $data = $this->layout();

        $data['pembelian'] = [];

        // Data
        if (isset($_GET['bulan']))
            $data['pembelian'] = $this->buku_besar_model->read_pembelian();

        $data['sub_breadcrumbs_title'] = "Buku Besar";
        $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

        // $data['rows'] = $this->model->read();
        $this->load->view('buku_besar_pembelian_read_view', $data);
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }
}

/* End of file Buku_besar.php */
