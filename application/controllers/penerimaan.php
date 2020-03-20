<?php
class Penerimaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	function index()
	{
		$data = [
			// 'id_pembelian'=> $this->model->get_id_bahan_baku(),
			'list' => $this->db->get('pembelian')->result(),
			'penerimaan' => $this->model->get_penerimaan()

		];
		$this->load->view('tabel', $data);
	}

	function add_data()
	{
		$this->model->penerimaan();


		redirect('penerimaan');
	}

	function lihat_laporan()
	{
		redirect('lapor');
	}
}
