<?php

class bahan_model extends CI_model
{
	public $id_bahan_baku;
	public $nama_bahan_baku;
	public $satuan;
	public $harga_satuan;
	public $labels = [];

	public function __construct()
	{
		parent::__construct();
		$this->labels = $this->_atributelabels();
		$this->load->database();
	}

	public function insert()
	{
		$data = [
			'id_bahan_baku' => $this->input->post('id_bahan_baku'),
			'nama_bahan_baku' => $this->input->post('nama_bahan_baku'),
			'satuan' => $this->input->post('satuan'),
			'harga_satuan' => $this->input->post('harga_satuan')
		];
		return $this->db->insert('bahan_baku', $data);
	}

	public function update()
	{
		$sql = sprintf(
			"UPDATE bahan_baku SET nama_bahan_baku ='%s',satuan='%s',harga_satuan ='%d' where id_bahan_baku='%s'",
			$this->nama_bahan_baku,
			$this->satuan,
			$this->harga_satuan,
			$this->id_bahan_baku
		);
		$this->db->query($sql);
	}

	public function delete()
	{
		$sql = sprintf("DELETE FROM bahan_baku WHERE id_bahan_baku='%s'", $this->id);
		$this->db->query($sql);
	}
	public function read()
	{
		$sql = "SELECT * FROM bahan_baku ORDER BY id_bahan_baku";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_last_row()
	{
		$query = $this->db->query('SELECT * FROM bahan_baku ORDER BY id_bahan_baku DESC LIMIT 1');
		return $query;
	}

	public function _atributelabels()
	{
		return [
			'id_bahan_baku' => 'id bahan baku:',
			'nama_bahan_baku' => 'nama bahan baku:',
			'satuan' => 'satuan:',
			'harga_satuan' => 'harga_satuan:'
		];
	}
}
