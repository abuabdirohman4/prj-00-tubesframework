<?php
class laporan_retur extends ci_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_lapor_retur');
	}
	function index(){
		$lapor['apoy']=$this->model_lapor_retur->laporan_default();
		$this->load->view('lapor_view_retur',$lapor);
	}
	function lapor1(){
		if (isset ($_POST['submit']))
		{
			$tanggal1 = $this->input->post('tanggal1');
			$tanggal2 = $this->input->post('tanggal2');
			$lapor['apoy']=$this->model_lapor_view->
			laporan($tanggal1,$tanggal2);
			$this->load->view('lapor_view_retur',$lapor);
		}
		else{
			$lapor['apoy']=$this->model_lapor_retur->laporan_default();
			$this->load->view('lapor_view_retur',$lapor);
		}
		
	}
	
}