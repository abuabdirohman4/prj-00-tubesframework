<!DOCTYPE html>
<html lang="en">

<head>
    <title>Penerimaan Bahan Baku</title>
</head>

<body>
    <h2>Transaksi Penerimaan Bahan Baku</h2>
    <hr>
    <?php $data1 = $this->session->flashdata('sukses');
    if ($data1 != '') {
        echo "<h4>" . $data1 . "</h4>";
    }
    ?>
    <form action="<?= site_url('penerimaan/add_data') ?>" method="POST">

        <!-- <label for="">Nama Vendor</label><br>
        <select name="kd_vendor">
            <option>-Pilih data-</option>
            <?php foreach ($kd_vendor as $row) { ?>
                <option value="<?= $row->kd_vendor ?>"><?= $row->nama_vendor ?></option>
            <?php } ?>
        </select></br></br> -->

        <!-- <label for="">Nama Bahan Baku</label><br>
        <select name="id_bahan_baku">
            <option>-Pilih data-</option>
            <?php foreach ($id_bahan_baku as $row) { ?>
                <option value="<?= $row->id_bahan_baku ?>"><?= $row->nama_bahan_baku ?></option>
            <?php } ?>
        </select></br></br> -->


        <label for="">ID Pembelian</label><br>
        <!-- <input type="text" name="id_pembelian"><br><br> -->
        <select name="id_pembelian">
            <option>-Pilih data-</option>
            <?php foreach ($list as $row) { ?>
                <option value="<?= $row->id_pembelian ?>"><?= $row->id_pembelian ?></option>
            <?php } ?>
        </select></br></br>




        <label for="">Jumlah</label><br>
        <input type="number" name="jumlah" placeholder="Input here"><br></br>

        <label for="">Tanggal Penerimaan</label><br>
        <input type="date" name="tgl_penerimaan" value="<?= date('Y-m-d') ?>"><br></br>

        <!-- <label for="">Harga</label><br>
        <input type="number" name="harga_satuan"placeholder="Input here"><br></br> -->

        <button type="submit">Simpan</button>
        <?php
        echo anchor('lapor', 'lihat_laporan', array('class' => 'btn btn-default')) ?>

    </form>
    </br>
    <table border="1">
        <th colspan="8">Daftar Pembelian</th>
        <tr>
            <th>No</th>

            <!-- <th>Nama Vendor</th> -->
            <th>ID Pembelian</th>
            <th>Stok</th>
            <th>Tanggal Penerimaan</th>
            <!-- <th>Qty</th> -->
            <!--  <th>harga</th>
            <th>subtotal</th> -->
        </tr>
        <?php $no = 1;
        $total = 0;
        foreach ($penerimaan as $row) { ?>
            <tr>
                <td><?= $no; ?></td>

                <!-- <td><?= $row->nama_vendor; ?></td> -->
                <td><?= $row->id_pembelian; ?></td>
                <!--  <td><?= $row->nama_bahan_baku; ?></td> -->
                <td><?= $row->jumlah; ?></td>
                <td><?= $row->tgl_penerimaan; ?></td>
                <!-- <td><?= $row->harga_satuan; ?></td>
                <td><?= $row->jumlah * $row->harga_satuan ?></td> -->
            </tr>
        <?php $no++;
            $total = $total + ($row->jumlah +  $row->jumlah);
        } ?>
        <th colspan="2">Total</th>
        <th><?= $total; ?></th>
    </table>
</body>

</html>