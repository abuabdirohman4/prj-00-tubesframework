<html>
<center>

	<head>
		<title>Kinicheesetea</title>
	</head>

	<body>
		<br><br>
		<h2>Kinicheesetea - KATEGORI</h2>
		<h3><br><br>
			<Button>
				<p><a href="kategori/create">TAMBAH</a></p>
			</button><br><br>




			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th width="100">ID Kategori</th>
						<th width="180">Nama Kategori</th>
						<th width="80">Ubah</th>
						<th width="80">Hapus</th>
					</tr>

				</thead>
				<tbody>
					<?php

					foreach ($rows as $row) {

					?>
						<tr>
							<td><?php echo $row->id_kategori; ?></td>
							<td><?php echo $row->nama_kategori; ?></td>


							<td align="center">
								<a href="kategori/update/<?php echo $row->id_kategori;  ?>">Ubah</a>
							</td>
							<td align="center">
								<a href="kategori/delete/<?php echo $row->id_kategori; ?>" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?');">Hapus</a>
							</td>

						</tr>
					<?php
					}
					?>
				</tbody>
			</table>