<?php
class laporan_penjualan extends ci_controller
{
function __construct()
{
parent :: __construct();
$this->load->model('model_laporan_penjualan');
}
function index()
{
$laporan_penjualan ['range'] = $this->model_laporan_penjualan->laporan_default();
$this->load->view('laporan_penjualan', $laporan_penjualan);
}
function lapor1()
{
if (isset ($_POST['submit']))
{
$tanggal1 = $this->input->post('tanggal1');
$tanggal2 = $this->input->post('tanggal2');
$laporan['range']=
$this->model_laporan_penjualan->laporan_periode($tanggal1,$tanggal2);
$this->load->view('laporan_penjualan',$laporan);
}
else
{
$laporan['range']=
$this->model_laporan_penjualan->laporan_default();
$this->load->view('laporan_penjualan',$laporan);
}
}


}