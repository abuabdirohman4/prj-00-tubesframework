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

            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="card-panel">
                            <div class="row">
                                <form action="storecreate" method="POST" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>id retur</label>
                                            <input type="text" value='<?php echo $id_string ?>' name="id_retur" class="form-control"><span class="text-danger"><?= form_error('id_retur') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">

                                            <select id='id_pembelian' name='id_pembelian'>
                                                <?php
                                                foreach ($pembelian as $k => $v) {

                                                    echo "<option value='$v->id_pembelian'>$v->id_pembelian</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>ID Pembelian </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select id="id_bahan_baku" name='id_bahan_baku'>
                                                <?php
                                                foreach ($bahan_baku as $k => $v) {

                                                    echo "<option value='$v->id_bahan_baku'>$v->id_bahan_baku</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>Bahan Baku </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Jumlah </label>
                                            <input type="text" name="jumlah_retur" class="form-control"><span class="text-danger"><?= form_error('jumlah_retur') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Tanggal pengembalian</label>
                                            <input type="date" id='tgl_retur' name="tgl_retur" class="datepicker"><span class="text-danger"><?= form_error('tgl_retur') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" name="btnsubmit" class="cyan waves-effect waves-light btn">Simpan<i class="mdi-content-send right"></i></button>
                                            </button>
                                            <a href="<?= base_url() ?>retur" class="btn waves-effect waves-light red"><i class=" mdi-content-clear"></i></a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--start container-->
            <div class="container">

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

<script>
    $(document).ready(() => {

        $("#tgl_retur").change(() => {
            
            var date = new Date($("#tgl_retur").val())
            date = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate()
            $("#tgl_retur").val(date)

            console.log($("#tgl_retur").val())
        })
    })
</script>
