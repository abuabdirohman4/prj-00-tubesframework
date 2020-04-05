<?php

class buku_besar_model extends CI_model
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

	public function update_keterangan($id_transaksi, $keterangan)
	{
		$this->db->query("UPDATE jurnal_umum SET keterangan='$keterangan' WHERE id_transaksi='$id_transaksi'");
	}

	public function delete()
	{
		$sql = sprintf("DELETE FROM coa WHERE no_akun='%s'", $this->id);
		$this->db->query($sql);
	}

	public function read_penjualan()
	{
		$sql = "SELECT jurnal_umum.*, coa.nama_akun FROM jurnal_umum JOIN coa ON jurnal_umum.kode_akun = coa.kode_akun WHERE MONTH(tgl_jurnal) = $_GET[bulan] AND jurnal_umum.kode_akun = 411 ORDER BY id_transaksi";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function read_pembelian()
	{
		$sql = "SELECT jurnal_umum.*, coa.nama_akun FROM jurnal_umum JOIN coa ON jurnal_umum.kode_akun = coa.kode_akun WHERE MONTH(tgl_jurnal) = $_GET[bulan] AND jurnal_umum.kode_akun = 113 ORDER BY id_transaksi";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function read_retur()
	{
		$sql = "SELECT jurnal_umum.*, coa.nama_akun FROM jurnal_umum JOIN coa ON jurnal_umum.kode_akun = coa.kode_akun WHERE MONTH(tgl_jurnal) = $_GET[bulan] AND jurnal_umum.kode_akun = 512 ORDER BY id_transaksi";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function read_kas()
	{
		$sql = "SELECT jurnal_umum.*, coa.nama_akun FROM jurnal_umum JOIN coa ON jurnal_umum.kode_akun = coa.kode_akun WHERE MONTH(tgl_jurnal) = $_GET[bulan] AND jurnal_umum.kode_akun = 111 ORDER BY id_transaksi";
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
