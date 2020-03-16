<?php

class pembelian_model extends CI_model
{
    public $id_pembelian;
    public $id_bahan_baku;
    public $jumlah;
    public $id_pegawai;
    public $kd_vendor;


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
            'id_pembelian' => $this->input->post('id_pembelian'),
            'id_bahan_baku' => $this->input->post('id_bahan_baku'),
            'jumlah' => $this->input->post('jumlah'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'kd_vendor  ' => $this->input->post('kd_vendor'),
        ];
        return $this->db->insert('pembelian', $data);
    }
    public function update()
    {
        $sql = sprintf(
            "UPDATE pembelian SET id_bahan_baku ='%s',jumlah='%s', id_pegawai='%s', kd_vendor='%s' where id_pembelian='%s'",
            $this->id_bahan_baku,
            $this->jumlah,
            $this->id_pegawai,
            $this->kd_vendor,
            $this->id_pembelian,
        );
        $this->db->query($sql);
    }
    public function delete()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = sprintf("DELETE FROM pembelian WHERE id_pembelian='%s'", $this->id);
        $this->db->query($sql);
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }
    public function read()
    {
        $sql = "SELECT * FROM pembelian ORDER BY id_pembelian";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function _atributelabels()
    {
        return [
            'id_pembelian' => 'ID Pembelian:',
            'id_bahan_baku' => 'ID Bahan Baku:',
            'jumlah' => 'Jumlah:',
            'id_pegawai' => 'ID Pegawai',
            'kd_vendor' => 'KD Vendor'
        ];
    }
    public function decrease($id_bahan_baku, $jumlah)
    {

        $query = $this->db->query("UPDATE bahan_baku SET jumlah=jumlah+$jumlah WHERE id_bahan_baku=$id_bahan_baku");
        return $query;
    }
}
