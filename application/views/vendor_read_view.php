<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<br><br><h2>Kinicheesetea - VENDOR</h2><h3><br><br>
<Button><p><a href="vendor/create">tambah</a></p></button><br><br>



<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">Kode Vendor</th>
<th width="120">Nama Vendor</th>
<th width="80">Alamat</th>
<th width="100">Ubah</th>
<th width="100">Hapus</th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
    <td><?php echo $row->kd_vendor;?></td>
<td><?php echo $row->nama_vendor;?></td>
<td><?php echo $row->alamat;?></td>
		<td align="center">
		<a href="vendor/update/<?php echo $row->kd_vendor; ?>">Ubah</a>
		</td>
		<td align="center">
		<a href="vendor/delete/<?php echo $row->kd_vendor; ?>"onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?');">Hapus</a>
		</td>

		</tr>
		<?php
		}
		?>
  </tbody>
</table>
