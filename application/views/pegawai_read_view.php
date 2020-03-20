<?= $head ?>

<!-- Start Page Loading -->
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<?= $header ?>

<!-- START MAIN -->
<div id="main">
	<!-- START WRAPPER -->
	<div class="wrapper">

		<?= $sidebar_left ?>

		<!-- START CONTENT -->
		<section id="content">

			<?= $breadcrumbs ?>

			<!--start container-->
			<div class="container">

				<Button>
					<p><a href="pegawai/create">TAMBAH</a></p>
				</button>

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
						foreach ($rows as $row) {
						?>
							<tr>
								<td><?php echo $row->id_pegawai; ?></td>
								<td><?php echo $row->nama_pegawai; ?></td>
								<td><?php echo $row->alamat; ?></td>
								<td><?php echo $row->no_telp; ?></td>

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
				</table>

			</div>
			<!--end container-->
		</section>
		<!-- END CONTENT -->

		<?= $sidebar_right ?>

	</div>
	<!-- END WRAPPER -->
</div>
<!-- END MAIN -->

<?= $footer ?>
<?= $scripts ?>