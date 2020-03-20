<?php
class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_bayar');
    }

    function index()
    {
        $data = [

            'id_pembelian' => $this->model_bayar->get_id_pembelian(),
            'jumlah_bayar' => $this->model_bayar->get_jumlah_bayar(),
            //'id_pegawai'=> $this->model_bayar->get_id_pegawai(),
            'pembayaran' => $this->model_bayar->get_pembayaran(),

        ];
        $this->load->view('view_pembayaran', $data);
    }

    function add_data()
    {
        $this->model_bayar->insert_penerimaan();
        redirect('pembayaran');
    }

    function lihat_laporan()
    {
        redirect('laporan_pembayaran');
    }
}
