<?php

class laba_rugi_model extends CI_model
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
		$data['pendapatan'] = $this->db->query("SELECT SUM(total) as total FROM nota_penjualan WHERE MONTH(tgl_jual) = $_GET[bulan] AND YEAR(tgl_jual) = $_GET[tahun]")->result()[0]->total;
		$data['pembelian_bulan_ini'] = $this->db->query("SELECT SUM(total_jumlah) as total FROM detail_pembelian WHERE MONTH(tanggal) = $_GET[bulan] AND YEAR(tanggal) = $_GET[tahun]")->result()[0]->total;
		$data['penjualan_bulan_ini'] = $this->db->query("SELECT SUM(detail_jual.jumlah*bahan_baku.harga_satuan) as total FROM detail_jual JOIN nota_penjualan ON detail_jual.no_nota = nota_penjualan.no_nota JOIN minuman ON minuman.id_minum = detail_jual.id_minum JOIN bahan_baku ON minuman.id_bahan_baku = bahan_baku.id_bahan_baku WHERE MONTH(nota_penjualan.tgl_jual) = " . $_GET['bulan'] . " AND YEAR(nota_penjualan.tgl_jual) = " . $_GET['bulan'])->result()[0]->total;
		$data['persediaan_akhir'] = $data['pembelian_bulan_ini'] - $data['penjualan_bulan_ini'];
		$data['pembelian_bulan_lalu'] = $this->db->query("SELECT SUM(total_jumlah) as total FROM detail_pembelian WHERE MONTH(tanggal) = " . ($_GET['bulan'] != 1 ? ($_GET['bulan'] - 1) : 12) . " AND YEAR(tanggal) = '" . ($_GET['bulan'] != 1 ? $_GET['tahun'] : ($_GET['tahun'] - 1)) . "'")->result()[0]->total;
		$data['penjualan_bulan_lalu'] = $this->db->query("SELECT SUM(detail_jual.jumlah*bahan_baku.harga_satuan) as total FROM detail_jual JOIN nota_penjualan ON detail_jual.no_nota = nota_penjualan.no_nota JOIN minuman ON minuman.id_minum = detail_jual.id_minum JOIN bahan_baku ON minuman.id_bahan_baku = bahan_baku.id_bahan_baku WHERE MONTH(nota_penjualan.tgl_jual) = " . ($_GET['bulan'] != 1 ? $_GET['bulan'] - 1 : 12) . " AND YEAR(nota_penjualan.tgl_jual) = " . ($_GET['bulan'] != 1 ? $_GET['tahun'] : $_GET['tahun'] - 1))->result()[0]->total;
		$data['persediaan_awal'] = $data['pembelian_bulan_lalu'] - $data['penjualan_bulan_lalu'];


		return $data;
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
