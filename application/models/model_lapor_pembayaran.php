<?php
class model_lapor_pembayaran extends ci_model
{
  function laporan_default()
  {
    $jeniper = "SELECT id_pembayaran,jumlah_bayar,pembayaran.id_pembelian,tgl_pembayaran FROM pembayaran JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian";
    return $this->db->query($jeniper);
  }
}
