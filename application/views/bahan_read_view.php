<center>
<br><br><h2>Kinicheesetea - BAHAN BAKU</h2><h3><br><br>
<Button><p><a href="bahan/create">TAMBAH</a></p></button><br><br></center>

<table class="table">
  <thead class="thead-dark">
    <tr>
	<th width="80">id bahan baku</th>
    <th width="120">Nama bahan baku</th>
    <th width="80">satuan</th>
    <th width="80">harga_satuan</th>
    <th width="100">Ubah</th>
    <th width="100">Hapus</th>
	</tr>

  </thead>
  <tbody>
<?php
foreach ($rows as $row){
?>
    <tr>
    <td><?php echo $row->id_bahan_baku;?></td>
    <td><?php echo $row->nama_bahan_baku;?></td>
    <td><?php echo $row->satuan;?></td>
    <td><?php echo $row->harga_satuan;?></td>
	
		<td align="center">
		<a href="bahan/update/<?php echo $row->id_bahan_baku; ?>">Ubah</a>
		</td>
      <td align="center">
    <a href="bahan/delete/<?php echo $row->id_bahan_baku; ?>" onclick="return confirm('anda yakin mau menghapus?');">Hapus</a>
    </td>
	

		</tr>
		<?php
		}
		?>
  </tbody>
</table>