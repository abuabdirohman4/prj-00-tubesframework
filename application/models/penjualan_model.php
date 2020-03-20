<?php

class penjualan_model extends CI_model
{
    public $id_pembelian;
    public $id_bahan_baku;
    public $jumlah;
    public $id_pegawai;
    public $kd_vendor;


    public $labels = [];

    function __construct()
    {
        parent::__construct();
        $this->labels = $this->_atributelabels();
        $this->load->database();
    }
    function insert()
    {
        $data = [
            'id_jual' => $this->input->post('id_penjualan'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'status' => '1',
        ];
        $this->db->insert('penjualan', $data);
        $id_penjualan = $this->input->post('id_penjualan');
        $last_id = $this->model->db->query("SELECT * FROM nota_penjualan ORDER BY no_nota DESC LIMIT 1")->result()[0]->no_nota;
        $id_number = (int) substr($last_id, 1, 3);
        $id_number++;
        $id_number = (string) $id_number;
        if (strlen($id_number) == 1)
            $id_string = 'N00' . $id_number;
        else if (strlen($id_number) == 2)
            $id_string = 'N0' . $id_number;
        else
            $id_string = 'N' .  $id_number;
        // nota
        $total = 0;
        $jumlah = 0;
        foreach ($this->input->post('id_minum') as $k => $v) {
            $harga = $this->db->get('minuman')->result()[0]->harga;

            $detail_jual = [
                'id_minum' => $v,
                'no_nota' => $id_string,
                'subtotal' => $harga * $this->input->post('jumlah')[$k],
                'jumlah' => $this->input->post('jumlah')[$k]
            ];
            $total += $harga * $this->input->post('jumlah')[$k];
            $jumlah += $this->input->post('jumlah')[$k];
            $this->db->query('SET FOREIGN_KEY_CHECKS=0');
            $this->db->insert('detail_jual', $detail_jual);
            $this->db->query('SET FOREIGN_KEY_CHECKS=1');
        }
        $nota = [
            'no_nota' => $id_string,
            'id_jual' => $id_penjualan,
            'total' => $total,
            'jumlah' => $jumlah,
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];
        $no_nota = $this->db->insert('nota_penjualan', $nota);
    }
    function update()
    {
        $id_jual = $this->input->post('id_jual');
        $id_pegawai = $this->input->post('id_pegawai');
        $sql = sprintf(
            "UPDATE penjualan SET id_pegawai='%s', status='1' where id_jual='%s'",
            $id_pegawai,
            $id_jual
        );
        $this->db->query($sql);
        $no_nota = $this->model->db->query("SELECT * FROM nota_penjualan WHERE id_jual='$id_jual'")->result()[0]->no_nota;
        $total = 0;
        $jumlah = 0;
        foreach ($_POST['id_minum'] as $k => $v) {
            $harga = $this->db->get('minuman')->result()[0]->harga;
            $this->db->query("UPDATE detail_jual SET id_minum='$v', jumlah='" . $_POST["jumlah"][$k] . "' WHERE id_minum='$v' AND no_nota='$no_nota'");
            $total += $harga * $this->input->post('jumlah')[$k];
            $jumlah += $this->input->post('jumlah')[$k];
        }
        $this->db->query("UPDATE nota_penjualan SET jumlah='$jumlah', total='$total' WHERE no_nota='$no_nota'");
    }
    function delete()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $no_nota = $this->db->query("SELECT * FROM nota_penjualan WHERE id_jual='$this->id'")->result()[0]->id_jual;
        $this->db->query("DELETE FROM detail_jual WHERE no_nota = '$no_nota'");
        $sql = sprintf("DELETE FROM penjualan WHERE id_jual='%s'", $this->id);
        $this->db->query($sql);
        $sql = sprintf("DELETE FROM nota_penjualan WHERE id_jual='%s'", $this->id);
        $this->db->query($sql);
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }
    function read()
    {
        $sql = "SELECT * FROM penjualan ORDER BY id_jual";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function _atributelabels()
    {
        return [
            'id_pembelian' => 'ID Pembelian:',
            'id_bahan_baku' => 'ID Bahan Baku:',
            'jumlah' => 'Jumlah:',
            'id_pegawai' => 'ID Pegawai',
            'kd_vendor' => 'KD Vendor'
        ];
    }
    function increase($id_bahan_baku, $jumlah)
    {

        $query = $this->db->query("UPDATE bahan_baku SET jumlah_stok=jumlah_stok+$jumlah WHERE id_bahan_baku='$id_bahan_baku'");
        return $query;
    }
}
