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
					<p><a href="kategori/create">TAMBAH</a></p>
				</button>
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