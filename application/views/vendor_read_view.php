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

				<!--Tambah Button-->
				<div class="divider"></div>

				<a href="<?= base_url() ?>vendor/create">
					<button class="cyan waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
						<i class="mdi-content-add left"></i>TAMBAH
					</button>
				</a>

				<div class="divider"></div>
				<!--End Tambah Button-->

				<!--DataTables-->
				<div id="table-datatables">
					<div class="row">
						<div class="col s4 m8 l12">

							<table id="data-table-simple" class="responsive-table display" cellspacing="0" style="text-align: center">
								<thead>
									<tr>
										<th width="10%">Kode Vendor</th>
										<th width="120">Nama Vendor</th>
										<th width="20%">Alamat</th>
										<th width="10%">Ubah</th>
										<th width="10%">Hapus</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($rows as $row) {
									?>
										<tr>
											<td><?php echo $row->kd_vendor; ?></td>
											<td style="text-align: left!important; padding-left:5%"><?php echo $row->nama_vendor; ?></td>
											<td><?php echo $row->alamat; ?></td>
											<td>
												<a href="update/<?php echo $row->kd_vendor; ?>">Ubah</a>
											</td>
											<td>
												<a href="delete/<?php echo $row->kd_vendor; ?>" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?');">Hapus</a>
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
