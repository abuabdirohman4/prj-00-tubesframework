<?php  
class model_lapor_pembelian extends ci_model{
 function laporan_default(){
  $jeniper="SELECT *
  FROM trans_pembelian";
  return $this->db->query($jeniper);
 }

 function laporan_periode($tanggal1, $tanggal2)
 {
  $query="SELECT *
  FROM trans_pembelian
  WHERE tgl_beli between '$tanggal1' and '$tanggal2' ";
  return $this->db->query($query);
 }
}
?>