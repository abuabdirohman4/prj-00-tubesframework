<?php

class jurnal_umum_model extends CI_model
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

	public function insert($id_transaksi, $kode_akun, $tgl_jurnal, $posisi_d_c, $nominal, $kelompok, $transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'kode_akun' => $kode_akun,
			'tgl_jurnal' => $tgl_jurnal,
			'posisi_d_c' => $posisi_d_c,
			'nominal' => $nominal,
			'kelompok' => $kelompok,
			'transaksi' => $transaksi
		);

		return $this->db->insert('jurnal_umum', $data);
		$this->db->query($sql);
	}

	public function update()
	{
	}

	public function delete()
	{
		$sql = sprintf("DELETE FROM coa WHERE no_akun='%s'", $this->id);
		$this->db->query($sql);
	}

	public function read()
	{
		$sql = "SELECT jurnal_umum.*, coa.nama_akun FROM jurnal_umum JOIN coa ON jurnal_umum.kode_akun = coa.kode_akun WHERE MONTH(tgl_jurnal) = $_GET[bulan] ORDER BY posisi_d_c DESC";
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
