<!DOCTYPE html>
<html lang="en">

<head>
    <title>Penjualan Minuman</title>
</head>

<body>
    <h2>Form Penjualan Minuman</h2>
    <hr>
    <form action="<?= site_url('penjualan/add_data') ?>" method="POST">
        <label for="">ID Jual</label><br>
        <input type="text" name="id_jual" placeholder="Input here"><br></br>

        <label for="">No Nota</label><br>
        <input type="text" name="no_nota" placeholder="Input here"><br></br>

        <label for="">id Pegawai</label><br>
        <select name="id_pegawai">
            <option>-Pilih data-</option>
            <?php foreach ($id_pegawai as $row) { ?>
                <option value="<?= $row->id_pegawai ?>"><?= $row->nama_pegawai ?></option>
            <?php } ?>
        </select></br></br>

        <label for="">Tanggal Penjualan</label><br>
        <input type="date" name="tgl_jual" value="<?= date('Y-m-d') ?>"><br></br>

        <label for="">Nama Barang</label><br>
        <select name="nama_minum">
            <option>-Pilih data-</option>
            <?php foreach ($nama_minum as $row) { ?>
                <option value="<?= $row->nama_minum ?>"><?= $row->nama_minum ?></option>
            <?php } ?>
        </select></br></br>

        <label for="">Jumlah</label><br>
        <input type="number" name="jumlah" placeholder="Input here"><br></br>

        <label for="">Harga</label><br>
        <input type="number" name="harga" placeholder="Input here"><br></br>

        <button type="submit">Simpan</button>
        <?php echo anchor('laporan_penjualan', 'Lihat Laporan', array('class' => 'btn btn-default')) ?>
    </form>
    </br>
    <table border="1">
        <th colspan="9">Daftar Pembelian</th>
        <tr>
            <th>No</th>
            <th>ID Jual</th>
            <th>No Nota</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Pembelian</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>harga</th>
            <th>Total</th>
        </tr>
        <?php $no = 1;
        $total = 0;
        foreach ($penjualan as $row) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row->id_jual; ?></td>
                <td><?= $row->no_nota; ?></td>
                <td><?= $row->id_pegawai; ?></td>
                <td><?= $row->tgl_jual; ?></td>
                <td><?= $row->nama_minum; ?></td>
                <td><?= $row->jumlah; ?></td>
                <td><?= $row->harga; ?></td>
                <td><?= $row->jumlah * $row->harga ?></td>
            </tr>
        <?php $no++;
            $total = $total + ($row->jumlah * $row->harga);
        } ?>
        <th colspan="8">Total</th>
        <th><?= $total; ?></th>
    </table>
</body>

</html>