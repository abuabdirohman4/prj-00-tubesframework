<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<br><br><h2>Kinicheesetea - COA</h2><h3>
<Button><p><a href="coa/create">TAMBAH</a></p></button>




<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">No Akun</th>
	<th width="120">Nama Akun</th>
	<th width="80">Header </th>
	<th width="80"> </th>
	<th width="80"> </th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
		<td><?php echo $row->no_akun;?></td>
		<td><?php echo $row->nama_akun;?></td>
		<td><?php echo $row->header_akun;?></td>
	
		<td align="center">
		<a href="coa/update/<?php echo $row->no_akun;  ?>">Ubah</a>
		</td>
		<td align="center">
		<a href="coa/delete/<?php echo $row->no_akun;?>" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?');">Hapus</a>
		</td>

		</tr>
		
		<?php
		}
		?>

  </tbody>
</table>