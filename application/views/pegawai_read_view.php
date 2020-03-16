<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<br><br><h2>Kinicheesetea - COA</h2><h3><br><br>
<Button><p><a href="pegawai/create">TAMBAH</a></p></button><br><br>




<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">Id Pegawai</th>
	<th width="120">Nama Pegawai</th>
	<th width="80">Alamat</th>
	<th width="80">Nomor</th>
	<th width="80"> </th>
	<th width="80"> </th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
		<td><?php echo $row->id_pegawai;?></td>
		<td><?php echo $row->nama_pegawai;?></td>
		<td><?php echo $row->alamat;?></td>
		<td><?php echo $row->no_telp;?></td>

		<td align="center">
		<a href="pegawai/update/<?php echo $row->id_pegawai;  ?>">Ubah</a>
		</td>
		<td align="center">
			<a href="pegawai/delete/<?php echo $row->id_pegawai; ?>" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?');">Hapus</a>
		</td>

		</tr>
		<?php
	}
	?>
		
		
  </body>
</table>