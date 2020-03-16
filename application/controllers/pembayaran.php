<?php
class pembayaran extends CI_Controller
{
public function __construct()
{
parent :: __construct ();
$this->load->model('model_bayar');
}
public function index()
{
$data=[

'id_pembelian'=> $this->model_bayar->get_id_pembelian(),
'jumlah_bayar'=> $this->model_bayar->get_jumlah_bayar(),
//'id_pegawai'=> $this->model_bayar->get_id_pegawai(),
'pembayaran'=> $this->model_bayar->get_pembayaran(),

];
$this->load->view('view_pembayaran',$data);
}
public function add_data()
{
$this->model_bayar->insert_penerimaan();
redirect('pembayaran');
}
public function lihat_laporan()
{
redirect('laporan_pembayaran');
}
}
