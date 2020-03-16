<?php

class coa_model extends CI_model
{
	public $no_akun;
	public $nama_akun;
	public $header_akun;

	public $labels = [];

	public function __construct()
	{
		parent::__construct();
		$this->labels = $this->_atributelabels();
		$this->load->database();
	}
	public function insert()
	{
		$data = array(
			'no_akun' => $this->input->post('no_akun'),
			'nama_akun' => $this->input->post('nama_akun'),
			'header_akun' => $this->input->post('header_akun'),



		);
		return $this->db->insert('coa', $data);

		// $this->db->query($sql);
	}
	public function update()
	{
		$sql = sprintf(
			"UPDATE coa SET nama_akun ='%s', header_akun='%s' where no_akun='%s'",
			$this->nama,
			$this->header,
			$this->id,



		);
		$this->db->query($sql);
	}
	public function delete()
	{
		$sql = sprintf("DELETE FROM coa WHERE no_akun='%s'", $this->id);
		$this->db->query($sql);
	}
	public function read()
	{
		$sql = "SELECT * FROM coa ORDER BY no_akun";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function _atributelabels()
	{
		return [
			'no_akun' => 'No Akun:',
			'nama_akun' => 'Nama Akun:',
			'header_akun' => 'Header Akun:'

		];
	}
}
