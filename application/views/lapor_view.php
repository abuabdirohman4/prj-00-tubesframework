<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Transaksi Penerimaan</title>
</head>
<h3>Laporan Transaksi</h3>
<?php
echo form_open('lapor/lapor1');
?>
<!-- <table class="table table-bordered">
    <tr><td>
            <div class="col-sm-2">
                <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai">
            </div>
            <div class="col-sm-2">
                <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Selesai">
            </div>
        </td></tr>
    <tr><td><button class="btn btn-primary btn-sm" type="submit" name="submit">Proses</button></td></tr>
</table> -->
</form>
<hr>
<table border = "1">
    <tr><th>No</th>
           <th>ID Pembelian</th>
          <!--  <th>Bahan Baku</th>  -->
           <th>stok</th>

        <!-- <th>total </th> -->

    <?php
    $no=1;
    $total=0;
    foreach ($apoy->result() as $r)
    {
        echo "<tr>
            <td width='10'>".$no."</td>
            <td width='160'>".$r->id_pembelian."</td>
           
              <td width='15'>".$r->stok."</td>
            </tr>";
        $no++;
        // $stok=$jumlah+$jumlah;
    }
    ?>
   <!--  <tr><td colspan="3">Total -->
<!-- </td><td align="right"><?php echo format_rp($total);?></td></tr> -->
</table>
