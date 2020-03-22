<?php

class pembelian_model extends CI_model
{
public $id_pembelian;
public $id_bahan_baku;
public $jumlah;
public $id_pegawai;
public $kd_vendor;


public $labels=[];

public function __construct(){
parent::__construct();
$this->labels=$this->_atributelabels();
$this->load->database();
}
public function insert(){
$data=[
'id_pembelian'=>$this->input->post('id_pembelian'),
'id_pegawai'=>$this->input->post('id_pegawai'),
'kd_vendor  '=>$this->input->post('kd_vendor'),
];
$this->db->insert('pembelian',$data);
$id_pembelian = $this->input->post('id_pembelian');

    foreach($this->input->post('id_bahan_baku') as $k=>$v) {
        $harga = $this->db->get('bahan_baku')->result()[0]->harga_satuan;

        $data_detail=[
            'id_bahan_baku'=>$v,
            'id_pembelian'=>$id_pembelian,
            'total_jumlah'=>$harga*$this->input->post('jumlah')[$k],
            'jumlah' => $this->input->post('jumlah')[$k]
        ];
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->insert('detail_pembelian', $data_detail);
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }
}
public function update(){
$id_pembelian=$this->input->post('id_pembelian');
$id_pegawai=$this->input->post('id_pegawai');
$kd_vendor=$this->input->post('kd_vendor');
$sql=sprintf("UPDATE pembelian SET id_pegawai='%s', kd_vendor='%s' where id_pembelian='%s'",
$id_pegawai,
$kd_vendor,
$id_pembelian
);
$this->db->query($sql);
foreach($_POST['id_bahan_baku'] as $k => $v) {
    $this->db->query("UPDATE detail_pembelian SET id_bahan_baku='$v', jumlah='" . $_POST["jumlah"][$k] . "' WHERE id_pembelian='$id_pembelian' AND id_bahan_baku='" . $_POST["bahan_baku_src"][$k] . "'");
}
}
public function delete(){
$this->db->query('SET FOREIGN_KEY_CHECKS=0');
$sql=sprintf("DELETE FROM pembelian WHERE id_pembelian='%s'",$this->id);
$this->db->query($sql);
$sql=sprintf("DELETE FROM detail_pembelian WHERE id_pembelian='%s'",$this->id);
$this->db->query($sql);
$this->db->query('SET FOREIGN_KEY_CHECKS=1');

}
public function read(){
$sql="SELECT * FROM pembelian ORDER BY id_pembelian";
$query=$this->db->query($sql);
return $query->result();
}

public function _atributelabels(){
return[
'id_pembelian'=>'ID Pembelian:',
'id_bahan_baku'=>'ID Bahan Baku:',
'jumlah'=>'Jumlah:',
'id_pegawai'=>'ID Pegawai',
'kd_vendor'=>'KD Vendor'
];
}
public function increase($id_bahan_baku, $jumlah) {

    $query = $this->db->query("UPDATE bahan_baku SET jumlah_stok=jumlah_stok+$jumlah WHERE id_bahan_baku='$id_bahan_baku'");
    return $query;
}

}