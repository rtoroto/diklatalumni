
<?php

//$status=array(0=>'Lunas',1=>'Pembayaran Ke 1',2=>'Pembayaran Ke 2',3=>'Pembayaran Ke 3',4=>'Pembayaran Ke 4');
echo form_open('laporandiklat');
?>
<table class="table table-bordered">
    <tr><th width="10">No</th>
    <th width="90">ID Transaksi </th>
        <th width="70">Tanggal Transaksi </th>
        <th>NIS</th>
        <th width="200">Angsuran Ke </th>
        <th width="220">Semester Ke </th>
        <th width="220">ID Tahun Ajaran</th>
        <th width="60">Jumlah Bayar </th>
    </tr>
    <?php
    $no=1;
    $jml_bayar=0;
    foreach ($transaksi as $r)
    {
        echo "<tr>
            <td>$no</td>
            <td>".  $r->nip."</td>
            <td>".  $r->nip."</td>
            <td>".  $r->nip."</td>
            <td>".  $r->nip."</td>
            <td>".  $r->semester_ke."</td>
            <td>".  $r->nip."</td>
            <td align='right'>".  rp((int)$r->nip)."</td>
            </tr>";

        $no++;
    }
    ?>
    <tr><td colspan="7"><p align='right'>Grand Total</p></td><td align='right'><?php echo rp($jml_bayar);?></td></tr>
</table>

<script type="text/javascript">
function cetak(id,id2)
{
    window.open('http://localhost/akademik/keuangan/cetak/','1397003076569','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
}
</script>



