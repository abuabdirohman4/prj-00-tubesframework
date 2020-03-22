<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pembayaran Bahan Baku</title>
</head>
<body>
    <h2>Transaksi Pembayaran Bahan Baku</h2>
    <hr>
    <form action="<?=site_url('pembayaran/add_data')?>" method="POST">
   
        <label for="">Tanggal Pembayaran</label><br>
        <input type="date" name="tgl_pembayaran" value="<?= date('Y-m-d')?>"><br></br>

         <label for="">id pembayaran</label><br>
        <input type="text" name="id_pembayaran" placeholder="Input here"><br></br>
       

        <label for="">ID pembelian</label><br>
        <select name="id_pembelian">
            <option>-Pilih data-</option>
            <?php foreach ($id_pembelian as $row) { ?>
                <option value="<?=$row->id_pembelian?>"><?= $row->id_pembelian?></option>
            <?php } ?>
        </select></br></br>

        <label for="">Jumlah_bayar</label><br>
        <input type="number" name="jumlah_bayar" placeholder="Input here"><br></br>
       
       

        <button type="submit">Simpan</button>
        <?php
        echo anchor('laporan_pembayaran','lihat_laporan',array('class'=>'btn btn-default'))?>
    </form>
    </br>
    <table border="1">
        <th colspan="8">Daftar Pembayaran</th>
        <tr>
            <th>No</th>
            <th>Tanggal Pembayaran</th>
            <th>id Pembayaran</th>
            <th>id pembelian</th>
            <th>jumlah bayar</th>            
         

        </tr>
        <?php $no=1; $total = 0;
            foreach ($pembayaran as $row) { ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$row->tgl_pembayaran;?></td>
                <td><?=$row->id_pembayaran;?></td>
                <td><?=$row->id_pembelian;?></td>
                <td><?=$row->jumlah_bayar;?></td>
               
            </tr>
            <?php $no++; $total=$total+$row->jumlah_bayar;} ?>            <th colspan="4">Total</th>
            <th><?=$total;?></th>
    </table>
</body>
</html>
