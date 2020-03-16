<?php
class penjualan extends CI_Controller
{
public function __construct()
{
parent :: __construct ();
$this->load->model('penjualan_model');
}
public function index()
{
$data=[
'nama_minum'=> $this->penjualan_model->get_id_minum(),
'no_nota'=>$this->penjualan_model->get_no_nota(),
'id_pegawai'=>$this->penjualan_model->get_id_pegawai(),
'penjualan'=> $this->penjualan_model->get_penjualan(),
];
$this->load->view('table_penjualan',$data);
}
public function add_data()
{
$this->penjualan_model->insert_penjualan();
redirect('penjualan');
}
}