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

                <h4 style="text-align: center"><?php echo isset($_GET['bulan']) ? 'Bulan ke-' . $_GET['bulan'] . ' Tahun ' . $_GET['tahun'] : "Buku Besar Pembelian" ?></h4>

                <div class="divider"></div>
                <!--End Tambah Button-->

                <!--DataTables-->
                <div id="table-datatables">
                    <div class="row">
                        <div class="col s4 m8 l12">

                            <table id="data-table-simple" class="responsive-table display" cellspacing="0" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="">Tanggal</th>
                                        <th width="">Debit</th>
                                        <th width="">Kredit</th>
                                        <th width="">Saldo Debit</th>
                                        <th width="">Saldo Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $saldo_debit = 0;
                                    $saldo_credit = 0;

                                    foreach ($pembelian as $k => $v) {

                                        $debit = '';
                                        $credit = '';

                                        if ($v->posisi_d_c == 'd') {
                                            $debit = $v->nominal;
                                            $saldo_debit += $v->nominal;
                                        } else {
                                            $credit = $v->nominal;
                                            $saldo_credit += $v->nominal;
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $v->id_transaksi; ?></td>
                                            <td><?php echo $v->tgl_jurnal; ?></td>
                                            <td><?php echo $debit; ?></td>
                                            <td><?php echo $credit; ?></td>
                                            <td><?php echo $saldo_debit; ?></td>
                                            <td><?php echo $saldo_credit; ?></td>
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