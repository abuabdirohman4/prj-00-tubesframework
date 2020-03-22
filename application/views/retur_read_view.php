<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<br><br><h2>Kinicheesetea - PEmBELIAN</h2><h3><br><br>
<Button><p><a href="retur/create">TAMBAH</a></p></button><br><br>




<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">ID Retur</th>
    <th width="100">Tgl</th>
    <th width="100">Jumlah retur</th>
    <th width="100">ID Pembelian</th>
    <th width="100">ID Bahan Baku</th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
    <td><?php echo $row->id_retur;?></td>
    <td><?php echo $row->tgl_retur;?></td>
    <td><?php echo $row->jumlah_retur;?></td>
    <td><?php echo $row->id_pembelian;?></td>
    <td><?php echo $row->id_bahan_baku;?></td>
		<td align="center">
		<a href="retur/update/<?php echo $row->id_retur;  ?>">Ubah</a>
		</td>
		<td align="center">
		<a href="retur/delete/<?php echo $row->id_retur; ?>" onclick="return confirm('anda yakin mau hapus?');">Hapus</a>
		</td>

		</tr>
		<?php
		}
		?>
  </tbody>
</table>
