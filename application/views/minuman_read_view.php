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
					<p><a href="minuman/create">TAMBAH</a></p>
				</button>

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
						foreach ($rows as $row) {
						?>
							<tr>
								<td><?php echo $row->id_minum; ?></td>
								<td><?php echo $row->nama_minum; ?></td>
								<td><?php echo $row->harga; ?></td>
								<td><?php echo $row->id_kategori; ?></td>
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