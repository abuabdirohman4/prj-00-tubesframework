 <?php
  class model_lapor_retur extends ci_model
  {
    function laporan_default()
    {
      $jeniper = "SELECT id_retur,tgl_retur,id_pembelian,nama_bahan_baku,retur_pembelian.id_bahan_baku,jumlah_retur,satuan FROM retur_pembelian JOIN bahan_baku ON bahan_baku.id_bahan_baku=retur_pembelian.id_bahan_baku";
      return $this->db->query($jeniper);
    }
  }
  ?>
