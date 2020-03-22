<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<br><br><h2>Kinicheesetea - MINUMAN</h2><h3><br><br>
<Button><p><a href="minuman/create">TAMBAH</a></p></button><br><br>




<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">ID Barang</th>
    <th width="180">Nama Barang</th>
    <th width="80">Harga</th>
    <th width="100">ID Kategori</th>
    <th width="100">Ubah</th>
    <th width="100">Hapus</th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
    <td><?php echo $row->id_minum;?></td>
    <td><?php echo $row->nama_minum;?></td>
    <td><?php echo $row->harga;?></td>
    <td><?php echo $row->id_kategori;?></td>
		<td align="center">
		<a href="minuman/update/<?php echo $row->id_minum;  ?>">Ubah</a>
		</td>
		<td align="center">
		<a href="minuman/delete/<?php echo $row->id_minum; ?>" onclick="return confirm('anda yakin mau hapus?');">Hapus</a>
		</td>

		</tr>
		<?php
		}
		?>
  </tbody>
</table>
