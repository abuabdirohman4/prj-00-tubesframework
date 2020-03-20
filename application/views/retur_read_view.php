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

				<a href="<?= base_url() ?>retur/create">
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
										<th width="">ID Retur</th>
										<th width="">Tgl</th>
										<th width="">Jumlah retur</th>
										<th width="">ID Pembelian</th>
										<th width="">ID Bahan Baku</th>
										<th width="">Ubah</th>
										<th width="">Hapus</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($rows as $row) {
									?>
										<tr>
											<td><?php echo $row->id_retur; ?></td>
											<td><?php echo $row->tgl_retur; ?></td>
											<td><?php echo $row->jumlah_retur; ?></td>
											<td><?php echo $row->id_pembelian; ?></td>
											<td><?php echo $row->id_bahan_baku; ?></td>
											<td>
												<a href="retur/update/<?php echo $row->id_retur;  ?>">Ubah</a>
											</td>
											<td>
												<a href="retur/delete/<?php echo $row->id_retur; ?>" onclick="return confirm('anda yakin mau hapus?');">Hapus</a>
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