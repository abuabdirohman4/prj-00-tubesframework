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

			<!--breadcrumbs start-->
			<div id="breadcrumbs-wrapper" class=" grey lighten-3">
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							<h5 class="breadcrumbs-title">Bahan Baku</h5>
							<ol class="breadcrumb">
								<li><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
								<li><a href="#">Bahan</a></li>
								<li class="active">Lihat Data Bahan</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!--breadcrumbs end-->

			<!--start container-->
			<div class="container">

				<br>
				<div class="divider"></div>

				<a href="<?= base_url() ?>bahan/create">
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
										<th width="">ID Bahan Baku</th>
										<th width="">Nama Bahan Baku</th>
										<th width="">Satuan</th>
										<th width="">Harga Satuan</th>
										<th width="">Ubah</th>
										<th width="">Hapus</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($rows as $row) {
									?>
										<tr>
											<td><?php echo $row->id_bahan_baku; ?></td>
											<td><?php echo $row->nama_bahan_baku; ?></td>
											<td><?php echo $row->satuan; ?></td>
											<td><?php echo $row->harga_satuan; ?></td>
											<td>
												<a href="bahan/update/<?php echo $row->id_bahan_baku; ?>">Ubah</a>
											</td>
											<td>
												<a href="bahan/delete/<?php echo $row->id_bahan_baku; ?>" onclick="return confirm('anda yakin mau menghapus?');">Hapus</a>
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
				<br />

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