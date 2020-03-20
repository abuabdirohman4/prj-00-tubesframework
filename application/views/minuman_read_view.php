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

				<br>
				<div class="divider"></div>

				<a href="<?= base_url() ?>minuman/create">
					<button style="width: 100%; height:3rem;">TAMBAH</button>
				</a>

				<div class="divider"></div>

				<!--DataTables-->
				<div id="table-datatables">
					<div class="row">
						<div class="col s4 m8 l12">

							<table id="data-table-simple" class="responsive-table display" cellspacing="0" style="text-align: center">
								<thead>
									<tr>
										<th width="10%">ID Barang</th>
										<th width="">Nama Barang</th>
										<th width="20%">Harga</th>
										<th width="10%">ID Kategori</th>
										<th width="10%">Ubah</th>
										<th width="10%">Hapus</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($rows as $row) {
									?>
										<tr>
											<td><?php echo $row->id_minum; ?></td>
											<td style="text-align: left!important; padding-left:5%"><?php echo $row->nama_minum; ?></td>
											<td><?php echo $row->harga; ?></td>
											<td><?php echo $row->id_kategori; ?></td>
											<td>
												<a href="minuman/update/<?php echo $row->id_minum;  ?>">Ubah</a>
											</td>
											<td>
												<a href="minuman/delete/<?php echo $row->id_minum; ?>" onclick="return confirm('anda yakin mau hapus?');">Hapus</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- End DataTables -->

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