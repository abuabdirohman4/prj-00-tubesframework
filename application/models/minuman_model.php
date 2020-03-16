<?php

class minuman_model extends CI_model
{
    public $id;
    public $nama;
    public $harga;
    public $id_kategori;
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
            'id_minum' => $this->input->post('id_minum'),
            'nama_minum' => $this->input->post('nama_minum'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('id_kategori'),
        ];
        return $this->db->insert('minuman', $data);
    }

    public function update()
    {
        $sql = sprintf(
            "UPDATE minuman SET nama_minum ='%s',harga='%s', id_kategori='%s' where id_minum='%s'",
            $this->nama,
            $this->harga,
            $this->id_kategori,
            $this->id,
        );
        $this->db->query($sql);
    }

    public function delete()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = sprintf("DELETE FROM minuman WHERE id_minum='%s'", $this->id);
        $this->db->query($sql);
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function read()
    {
        $sql = "SELECT * FROM minuman ORDER BY id_minum";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_last_row()
    {
        $query = $this->db->query('SELECT * FROM minuman ORDER BY id_minum DESC LIMIT 1');
        return $query->result();
    }

    public function _atributelabels()
    {
        return [
            'id' => 'ID Barang:',
            'nama' => 'Nama Barang:',
            'harga' => 'Harga:',
            'id_kategori' => 'ID Kategori'
        ];
    }
}
