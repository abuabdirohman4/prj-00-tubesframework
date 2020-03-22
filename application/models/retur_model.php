<?php

class retur_model extends CI_model
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
'id_retur'=>$this->input->post('id_retur'),
'tgl_retur'=>$this->input->post('tgl_retur'),
'jumlah_retur'=>$this->input->post('jumlah_retur'),
'id_pembelian'=>$this->input->post('id_pembelian'),
'id_bahan_baku' => $this->input->post('id_bahan_baku')
];
$this->db->insert('retur_pembelian',$data);
$this->db->query("UPDATE bahan_baku SET jumlah_stok=jumlah_stok-$_POST[jumlah_retur] WHERE id_bahan_baku='$_POST[id_bahan_baku]'");
$id_retur = $this->input->post('id_retur');
}
public function update(){
$id_retur=$this->input->post('id_retur');
$tgl_retur=$this->input->post('tgl_retur');
$jumlah_retur=$this->input->post('jumlah_retur');
$id_pembelian=$this->input->post('id_pembelian');
$id_bahan_baku=$this->input->post('id_bahan_baku');
$sql=sprintf("UPDATE retur SET tgl_retur='%s', jumlah_retur='1', id_pembelian='$jumlah_retur', id_bahan_baku='$id_bahan_baku' where id_retur='%s'",
$tgl_retur,
$jumlah_retur,
$id_pembelian,
$id_bahan_baku
);
$this->db->query($sql);
}
public function delete(){
$this->db->query('SET FOREIGN_KEY_CHECKS=0');
$sql=sprintf("DELETE FROM retur_pembelian WHERE id_retur='%s'",$this->id);
$this->db->query($sql);
$this->db->query('SET FOREIGN_KEY_CHECKS=1');

}
public function read(){
$sql="SELECT * FROM retur_pembelian ORDER BY id_retur";
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