<?php
class penerimaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}
	public function index()
	{
		$data = [
			// 'id_pembelian'=> $this->model->get_id_bahan_baku(),
			'list' => $this->db->get('pembelian')->result(),
			'penerimaan' => $this->model->get_penerimaan()

		];
		$this->load->view('tabel', $data);
	}
	public function add_data()
	{
		$this->model->penerimaan();


		redirect('penerimaan');
	}
	public function lihat_laporan()
	{
		redirect('lapor');
	}
}
