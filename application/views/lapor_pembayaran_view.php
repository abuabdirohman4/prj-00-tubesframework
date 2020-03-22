<center>
<h2>Laporan Transaksi Pembayaran</h2></center>
<?php
echo form_open('lapor/lapor1');
?>
<table class="table table-bordered">
           
</table><center>
</form>
<hr>
<table border = "1">
            <tr><th>No</th>
            <th>Tanggal Pembayaran</th>
            <th>id Pembayaran</th>
            <th>id pembelian</th>
            <th>jumlah bayar</th>  
    <?php
    $no=1;
    $total=0;
    foreach ($apoy->result() as $r)
    {
        echo "<tr>
    <td width='10'>".$no."</td>
    <td width='100'>".$r->tgl_pembayaran."</td>
    <td width='100'>".$r->id_pembayaran."</td>
    <td width='100'>".$r->id_pembelian."</td>
    <td width='100'>".$r->jumlah_bayar."</td>
 
   
            </tr>";
        $no++;
        $total=$total+$r->jumlah_bayar;
    }
    ?>
    <tr><td colspan="4" align="center">Total Bayar</td><td align="left"><?php echo ($total);?></td></tr>
</table></center>
