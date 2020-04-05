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

                <h4 style="text-align: center"><?php echo isset($_GET['bulan']) ? 'Bulan ke-' . $_GET['bulan'] . ' Tahun ' . $_GET['tahun'] : "Laba rugi" ?></h4>

                <div class="divider"></div>
                <!--End Tambah Button-->

                <?php

                if (!isset($_GET['bulan']))
                    $_GET['bulan'] = '-1';

                ?>

                <form action='' method='GET'>
                    <div class="row" style="">
                        <select class="col s6" name="bulan">
                            <option value="1" <?php echo $_GET['bulan'] == 1 ? "selected" : "" ?>>Januari</option>
                            <option value="2" <?php echo $_GET['bulan'] == 2 ? "selected" : "" ?>>Februari</option>
                            <option value="3" <?php echo $_GET['bulan'] == 3 ? "selected" : "" ?>>Maret</option>
                            <option value="4" <?php echo $_GET['bulan'] == 4 ? "selected" : "" ?>>April</option>
                            <option value="5" <?php echo $_GET['bulan'] == 5 ? "selected" : "" ?>>Mei</option>
                            <option value="6" <?php echo $_GET['bulan'] == 6 ? "selected" : "" ?>>Juni</option>
                            <option value="7" <?php echo $_GET['bulan'] == 7 ? "selected" : "" ?>>Juli</option>
                            <option value="8" <?php echo $_GET['bulan'] == 8 ? "selected" : "" ?>>Agustus</option>
                            <option value="9" <?php echo $_GET['bulan'] == 9 ? "selected" : "" ?>>September</option>
                            <option value="10" <?php echo $_GET['bulan'] == 10 ? "selected" : "" ?>>Oktober</option>
                            <option value="11" <?php echo $_GET['bulan'] == 11 ? "selected" : "" ?>>November</option>
                            <option value="12" <?php echo $_GET['bulan'] == 12 ? "selected" : "" ?>>Desember</option>
                        </select>
                        <input class="col s6" value="<?php echo isset($_GET['tahun']) ? $_GET['tahun'] : '' ?>" type="number" name="tahun" placeholder="Tahun" />
                    </div>
                    <button class="cyan waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
                        <i class="mdi-content-add left"></i>TAMPILKAN
                    </button>
                </form>

                <!--DataTables-->
                <?php
                if (isset($_GET['tahun'])) {
                ?>
                    <div>
                        <div class="row">
                            <div class="col s4 m8 l12">

                                <table class="excel-table laba-rugi-table" style="text-align:left!important">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center!important" colspan=4>Kini Cheese Tea</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center!important" colspan=4>Laporan Laba Rugi</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            if (isset($_GET['tahun'])) {
                                                $date = new DateTime($_GET['tahun'] . '-' . $_GET['bulan'] . '-01');
                                                $last_date = $date->format('t-m-Y');
                                            }
                                            ?>
                                            <th style="text-align:center!important" colspan=4>Per <?php if (isset($_GET['tahun'])) echo $last_date ?></th>
                                        </tr>
                                        <tr>
                                            <th width="20%" style="text-align:left"></th>
                                            <th width=""></th>
                                            <th width=""></th>
                                            <th width=""></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:left!important">
                                            <td style="text-align:left">Pendapatan</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Penjualan</td>
                                            <td>Rp. <?php echo isset($data['pendapatan']) ? $data['pendapatan'] : '' ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Pendapatan bunga</td>
                                            <td><u>Rp. 0</u></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Jumlah pendapatan</td>
                                            <td></td>
                                            <td>Rp. <?php echo isset($data['pendapatan']) ? $data['pendapatan'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left">Harga pokok penjualan</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Persediaan awal</td>
                                            <td>Rp. <?php echo isset($data['persediaan_awal']) ? $data['persediaan_awal'] : '' ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Pembelian</td>
                                            <td><u>Rp. <?php echo isset($data['pembelian_bulan_ini']) ? $data['pembelian_bulan_ini'] : '' ?> (+)</u></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Persediaan akhir</td>
                                            <td><u>Rp. <?php echo isset($data['persediaan_akhir']) ? $data['persediaan_akhir'] : '' ?> (-)</u></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>HPP</td>
                                            <td></td>
                                            <td></td>
                                            <td><u>Rp. <?php
                                                        if (isset($data['persediaan_awal'])) {
                                                            $hpp = $data['persediaan_awal'] + $data['pembelian_bulan_ini'] + $data['persediaan_akhir'];
                                                            echo $hpp;
                                                        }
                                                        ?> (-)</u></td>
                                        </tr>
                                        <tr>
                                            <td>Laba kotor</td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Rp. <?php echo isset($hpp) ? $data['pendapatan'] - $hpp : '' ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Beban usaha:</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Beban operasional:</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Gaji karyawan</td>
                                            <td>Rp. 3000000</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Biaya angkut</td>
                                            <td><u>Rp. 150000</u></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Total beban</td>
                                            <td></td>
                                            <td></td>
                                            <td><u><b>Rp. 4500000</b></u></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo ($data['pendapatan'] - $hpp) > 4500000 ? 'Laba' : 'Rugi' ?></td>
                                            <td></td>
                                            <td></td>
                                            <td><u><b>Rp. <?php echo 4500000 + $hpp + $data['pendapatan'] ?></b></u></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End DataTables -->

                    <!-- pdf table -->
                    <div id="table-pdf" style="display:none;text-align:left!important">
                        <center><b>Kini Cheese Tea</b></center>
                        <center><b><?php echo $breadcrumbs_title ?></b></center>
                        <?php
                        if (isset($_GET['tahun'])) {
                            $date = new DateTime($_GET['tahun'] . '-' . $_GET['bulan'] . '-01');
                            $last_date = $date->format('t-m-Y');
                        }
                        ?>
                        <center><b>Per <?php if (isset($_GET['tahun'])) echo $last_date ?></b></center>
                        <center>
                            <table style="text-align:left!important">
                                <thead>
                                    <tr>
                                        <th width="20%" style="text-align:left"></th>
                                        <th width=""></th>
                                        <th width=""></th>
                                        <th width=""></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:left!important">
                                        <td style="text-align:left">Pendapatan</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Penjualan</td>
                                        <td><?php echo isset($data['pendapatan']) ? $data['pendapatan'] : '' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Pendapatan bunga</td>
                                        <td>0</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Jumlah pendapatan</td>
                                        <td></td>
                                        <td><?php echo isset($data['pendapatan']) ? $data['pendapatan'] : '' ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">Harga pokok penjualan</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Persediaan awal</td>
                                        <td><?php echo isset($data['persediaan_awal']) ? $data['persediaan_awal'] : '' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Pembelian</td>
                                        <td><?php echo isset($data['pembelian_bulan_ini']) ? $data['pembelian_bulan_ini'] : '' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Persediaan akhir</td>
                                        <td><?php echo isset($data['persediaan_akhir']) ? $data['persediaan_akhir'] : '' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>HPP</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php
                                            if (isset($data['persediaan_awal'])) {
                                                $hpp = $data['persediaan_awal'] + $data['pembelian_bulan_ini'] + $data['persediaan_akhir'];
                                                echo $hpp;
                                            }
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>Laba kotor</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo isset($hpp) ? $hpp + $data['pendapatan'] : '' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Beban usaha:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Beban operasional:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Gaji karyawan</td>
                                        <td>Rp. 3000000</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Biaya angkut</td>
                                        <td>Rp. 150000</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Total beban</td>
                                        <td></td>
                                        <td></td>
                                        <td>Rp. 4500000</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo ($data['pendapatan'] - $hpp) > 4500000 ? 'Laba' : 'Rugi' ?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Rp. <?php echo 4500000 + $hpp + $data['pendapatan'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </div>
            </div>

            <!-- Downloads -->
            <div class="row">
                <div class="col s6">
                    <button id="download-excel" class="green waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
                        <i class="mdi-content-add left"></i>DOWNLOAD EXCEL
                    </button>
                </div>
                <div class="col s6">
                    <button id="download-pdf" class="red waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
                        <i class="mdi-content-add left"></i>DOWNLOAD PDF
                    </button>
                </div>
            </div>

        <?php } ?>

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

<style>
    .laba-rugi-table td,
    .laba-rugi-table th,
    .laba-rugi-table td {
        text-align: left !important
    }
</style>