<?php
class model_laporan_penjualan extends ci_model
{
    function laporan_default()
    {
        $query = "SELECT   p.nama_minum, sum(p.jumlah) as total ,p.harga, sum(p.jumlah*p.harga) as total_harga
FROM penjualan as p
GROUP BY p.nama_minum";
        return $this->db->query($query);
    }
    function laporan_periode($tanggal1, $tanggal2)
    {
        $query = "SELECT   p.nama_minum, sum(p.jumlah) as total ,p.harga, sum(p.jumlah*p.harga) as total_harga
FROM penjualan as p
WHERE tgl_jual between '$tanggal1' and '$tanggal2'
GROUP BY p.nama_minum";
        return $this->db->query($query);
    }
}
