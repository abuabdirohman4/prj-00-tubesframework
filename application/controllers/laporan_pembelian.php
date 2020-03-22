<?php

class laporan_pembelian extends ci_controller{

function __construct(){

parent::__construct();
$this->load->model('model_lapor_pembelian');

}


function index(){

$lapor['apoy']=$this->model_lapor_pembelian->laporan_default();
$this->load->view('lapor_view_pembelian',$lapor);
}

function lapor1(){
if(isset ($_POST['submit'])){

$tanggal1 = $this->input->post('tanggal1');
$tanggal2 = $this->input->post('tanggal2');

$lapor['apoy']=$this->model_lapor_pembelian->laporan_periode($tanggal1, $tanggal2);
$this->load->view('lapor_view_pembelian',$lapor);


}
else {
$lapor['apoy']=$this->model_lapor_pembelian->laporan_default();
$this->load->view('lapor_view_pembelian',$lapor);
}
}
}
