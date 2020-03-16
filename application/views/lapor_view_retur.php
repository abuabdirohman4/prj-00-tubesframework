<center>
<h2>Laporan Transaksi retur</h2></center>
<?php
echo form_open('lapor/lapor1');
?>
<table class="table table-bordered">
            
</table>
</form>
<hr>
<table border = "1">
    <tr><th>No</th>
        <th>id retur</th>
        <th>tgl retur</th>
        <th>id pembelian </th>
        <th>id bahan baku </th>
        <th>nama bahan baku</th>
        <th>jumlah bahan baku tersedia</th>
        <th>jumlah retur</th>
    <?php
    $no=1;
    $total=0;
    foreach ($apoy->result() as $r)
    {
        echo "<tr>
    <td width='10'>".$no."</td>
    <td width='100'>".$r->id_retur."</td>
    <td width='100'>".$r->tgl_retur."</td>
    <td width='100'>".$r->id_pembelian."</td>
    <td width='100'>".$r->id_bahan_baku."</td>
    <td width='180'>".$r->nama_bahan_baku."</td>
    <td width='100'>".$r->satuan."</td>
    <td width='100'>".$r->jumlah_retur."</td>
            </tr>";
        $no++;
        $total=$total+$r->jumlah_retur;
    }
    ?>
    <tr><td colspan="7" align="center">Total Retur</td><td align="left"><?php echo ($total);?></td></tr>
</table>