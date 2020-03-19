<center>
    <h2>Laporan Transaksi Pembelian</h2>
</center>
<?php
echo form_open('laporan_pembelian/lapor1');
?>
<table class="table table-bordered">

</table>
<tr>
    <td>
        <div>
            <input type="date" name="tanggal1" placeholder="tanggal Mulai">
        </div>

        <div>
            <input type="date" name="tanggal2" placeholder="tanggal Selesai">
        </div>
    </td>
</tr>
<tr>
    <td>
        <button type="submit" name="submit">Cari</button>
        </form>
        <hr>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tanggal Beli</th>
                <th>ID Pembelian</th>
                <th>ID Pegawai</th>
                <th>Nama Vendor</th>
                <th>Nama Bahan Baku</th>
                <th>Jumlah</th>


                <?php
                $no = 1;
                $total = 0;
                foreach ($apoy->result() as $r) {
                    echo "<tr>
    <td width='10'>" . $no . "</td>
    <td width='100'>" . $r->tgl_beli . "</td>
    <td width='100'>" . $r->id_pembelian . "</td>
    <td width='100'>" . $r->id_pegawai . "</td>
    <td width='100'>" . $r->nama_vendor . "</td>
    <td width='180'>" . $r->nama_bahan_baku . "</td>
    <td width='100'>" . $r->jumlah . "</td>
   
            </tr>";
                    $no++;
                }
                ?>

        </table>