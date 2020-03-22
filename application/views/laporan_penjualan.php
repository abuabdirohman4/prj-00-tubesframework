<h3>Laporan Transaksi Penjualan</h3>
<?php
echo form_open('laporan_penjualan/lapor1');
?>
<table>
<tr><td>
<div>
<input type="date" name="tanggal1" placeholder="tanggal Mulai">
</div>
<div>
<input type="date" name="tanggal2" placeholder="tanggal Selesai">
</div>
</td></tr>
<tr><td>
<button type="submit" name="submit">Proses</button>
</td></tr>
</table>
</form>
<hr>
<table border ="1">
<tr>
<th>No</th>
<th>Nama Produk</th>
<th>Jumlah Terjual</th>
<th>Harga</th>
<th>Total harga</th>

</tr>
<?php
$no=1;
$total=0;
$total_harga=0;
foreach ($range->result() as $r)
{
echo "<tr>
<td width='10'>".$no."</td>
<td width='160'>".$r->nama_minum."</td>
<td width='50' align='right'>".$r->total."</td>
<td width='100' align='right'>".$r->harga."</td>
<td width='130' align='right'>".$r->total_harga."</td>
</tr>";
$no++;
$total=$total+$r->total;
$total_harga=$total_harga+$r->total_harga;
}
?>
<tr><td colspan="4">Total</td>
<td align="right"><?php echo $total_harga;?></td>
</tr>
</table>