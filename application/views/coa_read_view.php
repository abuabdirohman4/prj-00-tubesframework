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
					<p><a href="coa/create">TAMBAH</a></p>
				</button>

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
						foreach ($rows as $row) {
						?>
							<tr>
								<td><?php echo $row->no_akun; ?></td>
								<td><?php echo $row->nama_akun; ?></td>
								<td><?php echo $row->header_akun; ?></td>

								<td align="center">
									<a href="coa/update/<?php echo $row->no_akun;  ?>">Ubah</a>
								</td>
								<td align="center">
									<a href="coa/delete/<?php echo $row->no_akun; ?>" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?');">Hapus</a>
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