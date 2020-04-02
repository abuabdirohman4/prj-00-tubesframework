<?php

class pembelian_model extends CI_model
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
        // get last transaction id
        $last_jurnal_id = $this->db->get('jurnal_umum')->result()[0]->id_transaksi;
        $jurnal_id = $last_jurnal_id + 1;

        $data = [
            'id_pembelian' => $this->input->post('id_pembelian'),
            'id_bahan_baku' => $this->input->post('id_bahan_baku'),
            'jumlah' => $this->input->post('jumlah'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'kd_vendor  ' => $this->input->post('kd_vendor'),
            'id_jurnal' => $jurnal_id
        ];

        $this->db->insert('pembelian', $data);

        // jurnal umum
        $jurnal_umum_c = [
            'id_transaksi' => $jurnal_id,
            'kode_akun' => 111,
            'posisi_d_c' => 'c',
            'nominal' => $this->input->post('jumlah'),
            'transaksi' => 'pembelian'
        ];

        $this->db->insert('jurnal_umum', $jurnal_umum_c);

        $jurnal_umum_d = [
            'id_transaksi' => $jurnal_id,
            'kode_akun' => 113,
            'posisi_d_c' => 'd',
            'nominal' => $this->input->post('jumlah'),
            'transaksi' => 'pembelian'
        ];

        $this->db->insert('jurnal_umum', $jurnal_umum_d);
    }

    // function __construct(){
    // parent::__construct();
    // $this->labels=$this->_atributelabels();
    // $this->load->database();
    // }
    // function insert(){
    // $data=[
    // 'id_pembelian'=>$this->input->post('id_pembelian'),
    // 'id_pegawai'=>$this->input->post('id_pegawai'),
    // 'kd_vendor  '=>$this->input->post('kd_vendor'),
    // ];
    // $this->db->insert('pembelian',$data);
    // $id_pembelian = $this->input->post('id_pembelian');

    //     foreach($this->input->post('id_bahan_baku') as $k=>$v) {
    //         $harga = $this->db->get('bahan_baku')->result()[0]->harga_satuan;

    //         $data_detail=[
    //             'id_bahan_baku'=>$v,
    //             'id_pembelian'=>$id_pembelian,
    //             'total_jumlah'=>$harga*$this->input->post('jumlah')[$k],
    //             'jumlah' => $this->input->post('jumlah')[$k]
    //         ];
    //         $this->db->query('SET FOREIGN_KEY_CHECKS=0');
    //         $this->db->insert('detail_pembelian', $data_detail);
    //         $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    //     }
    // }
    public function update()
    {
        $id_pembelian = $this->input->post('id_pembelian');
        $id_pegawai = $this->input->post('id_pegawai');
        $kd_vendor = $this->input->post('kd_vendor');
        $sql = sprintf(
            "UPDATE pembelian SET id_pegawai='%s', kd_vendor='%s' where id_pembelian='%s'",
            $id_pegawai,
            $kd_vendor,
            $id_pembelian
        );
        $this->db->query($sql);
        foreach ($_POST['id_bahan_baku'] as $k => $v) {
            $this->db->query("UPDATE detail_pembelian SET id_bahan_baku='$v', jumlah='" . $_POST["jumlah"][$k] . "' WHERE id_pembelian='$id_pembelian' AND id_bahan_baku='" . $_POST["bahan_baku_src"][$k] . "'");
        }
    }
    // public function delete(){
    // $this->db->query('SET FOREIGN_KEY_CHECKS=0');
    // $sql=sprintf("DELETE FROM pembelian WHERE id_pembelian='%s'",$this->id);
    // $this->db->query($sql);
    // $sql=sprintf("DELETE FROM detail_pembelian WHERE id_pembelian='%s'",$this->id);
    // $this->db->query($sql);
    // $this->db->query('SET FOREIGN_KEY_CHECKS=1');

    function delete()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // get id jurnal
        $pembelian = $this->db->query("SELECT * FROM pembelian WHERE id_pembelian='$this->id'")->result()[0];
        $id_jurnal = $pembelian->id_jurnal;

        // delete pembelian
        $sql = sprintf("DELETE FROM pembelian WHERE id_pembelian='%s'", $this->id);
        $this->db->query($sql);

        // delete jurnal
        $delete_jurnal = $this->db->query("DELETE FROM jurnal_umum WHERE id_transaksi = '$id_jurnal'");

        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function read()
    {
        $sql = "SELECT * FROM pembelian ORDER BY id_pembelian";
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

    function decrease($id_bahan_baku, $jumlah)
    {
        $query = $this->db->query("UPDATE bahan_baku SET jumlah=jumlah+$jumlah WHERE id_bahan_baku=$id_bahan_baku");
        return $query;
    }
}
