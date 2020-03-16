<?php
class model_laporan extends ci_model
{
    function laporan_default()
    {
        $jeniper = "SELECT pembelian.id_pembelian,sum(jumlah)as stok from pembelian JOIN penerimaan ON pembelian.id_pembelian=penerimaan.id_pembelian
  group by id_pembelian";
        return $this->db->query($jeniper);
    }
    // function laporan_periode($tanggal1,$tanggal2)
    // {
    //  $jeniper="SELECT nama_bahan_baku,bahan_baku.id_bahan_baku,qty,nama_bahan_baku,sum(pembelian.harga_satuan*jumlah)as total from bahan_baku JOIN pembelian ON bahan_baku.id_bahan_baku=pembelian.id_bahan_baku";
    //  return $this->db->query($jeniper);
    // }
}
