<?php

class penjualan_model extends CI_model
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

        // get last transaction id
        $last_jurnal_id = $this->db->query("SELECT * FROM jurnal_umum ORDER BY id_transaksi DESC LIMIT 1");
        if ($last_jurnal_id->num_rows() > 0)
            $last_jurnal_id = $last_jurnal_id->result()[0]->id_transaksi;
        else
            $last_jurnal_id = 0;

        $jurnal_id = $last_jurnal_id + 1;

        $data = [
            'id_jual' => $this->input->post('id_penjualan'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'status' => '1',
            'id_jurnal' => $jurnal_id
        ];

        $this->db->insert('penjualan', $data);

        $id_penjualan = $this->input->post('id_penjualan');
        $last_id = $this->model->db->query("SELECT * FROM nota_penjualan ORDER BY no_nota DESC LIMIT 1");
        if ($last_id->num_rows() > 0) {
            $last_id = $last_id->result()[0]->no_nota;
            $id_number = (int) substr($last_id, 1, 3);
        } else
            $id_number = 0;

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
        foreach ($this->input->post('id_minuman') as $k => $v) {
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

        // jurnal umum
        $jurnal_umum_d = [
            'id_transaksi' => $jurnal_id,
            'kode_akun' => 111,
            'posisi_d_c' => 'd',
            'nominal' => $total,
            'transaksi' => 'penjualan'
        ];

        $this->db->insert('jurnal_umum', $jurnal_umum_d);

        $jurnal_umum_c = [
            'id_transaksi' => $jurnal_id,
            'kode_akun' => 411,
            'posisi_d_c' => 'c',
            'nominal' => $total,
            'transaksi' => 'penjualan'
        ];

        $this->db->insert('jurnal_umum', $jurnal_umum_c);
    }

    public function update()
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

    public function delete()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // get id jurnal
        $penjualan = $this->db->query("SELECT * FROM penjualan WHERE id_jual='$this->id'")->result()[0];
        $id_jurnal = $penjualan->id_jurnal;

        // delete nota
        $no_nota = $this->db->query("SELECT * FROM nota_penjualan WHERE id_jual='$this->id'")->result()[0]->id_jual;
        $this->db->query("DELETE FROM detail_jual WHERE no_nota = '$no_nota'");

        // delete penjualan
        $sql = sprintf("DELETE FROM penjualan WHERE id_jual='%s'", $this->id);
        $this->db->query($sql);

        // delete nota penjualan
        $sql = sprintf("DELETE FROM nota_penjualan WHERE id_jual='%s'", $this->id);
        $this->db->query($sql);

        // delete jurnal
        $delete_jurnal = $this->db->query("DELETE FROM jurnal_umum WHERE id_transaksi='$id_jurnal'");

        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }
    public function read()
    {
        $sql = "SELECT * FROM penjualan ORDER BY id_jual";
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
    public function increase($id_bahan_baku, $jumlah)
    {

        $query = $this->db->query("UPDATE bahan_baku SET jumlah_stok=jumlah_stok+$jumlah WHERE id_bahan_baku='$id_bahan_baku'");
        return $query;
    }
}
