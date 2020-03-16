<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<br><br><h2>Kinicheesetea - PEmBELIAN</h2><h3><br><br>
<Button><p><a href="pembelian/create">TAMBAH</a></p></button><br><br>




<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">ID Pembelian</th>
    <th width="180">ID Bahan Baku</th>
    <th width="80">Jumlah</th>
    <th width="100">ID Pegawai</th>
    <th width="100">ID Vendor</th>
    <th width="100">Ubah</th>
    <th width="100">Hapus</th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
    <td><?php echo $row->id_pembelian;?></td>
    <td><?php echo $row->id_bahan_baku;?></td>
    <td><?php echo $row->jumlah;?></td>
    <td><?php echo $row->id_pegawai;?></td>
    <td><?php echo $row->kd_vendor;?></td>
		<td align="center">
		<a href="pembelian/update/<?php echo $row->id_pembelian;  ?>">Ubah</a>
		</td>
		<td align="center">
		<a href="pembelian/delete/<?php echo $row->id_pembelian; ?>" onclick="return confirm('anda yakin mau hapus?');">Hapus</a>
		</td>

		</tr>
		<?php
		}
		?>
  </tbody>
</table>
