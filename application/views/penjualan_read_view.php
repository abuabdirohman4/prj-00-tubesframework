<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<h2>Kinicheesetea - PENJUALAN</h2><h3>
<Button><p><a href="<?php echo base_url() ?>index.php/penjualan/create">TAMBAH</a></p></button><br><br>




<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">ID Penjualan</th>
    <th width="100">ID Pegawai</th>
    <th width="100">status</th>
    <th width="100">Ubah</th>
    <th width="100">Hapus</th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
    <td><?php echo $row->id_jual;?></td>
    <td><?php echo $row->id_pegawai;?></td>
    <td><?php echo $row->status;?></td>
		<td align="center">
		<a href="penjualan/update/<?php echo $row->id_jual;  ?>">Ubah</a>
		</td>
		<td align="center">
		<a href="penjualan/delete/<?php echo $row->id_jual; ?>" onclick="return confirm('anda yakin mau hapus?');">Hapus</a>
		</td>

		</tr>
		<?php
		}
		?>
  </tbody>
</table>
