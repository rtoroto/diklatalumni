<style type="text/css">
<!--
.style2 {font-size: 18px}
.style3 {font-size: 16px}
.style4 {font-size: 16px; font-weight: bold; }
-->
</style>
<body onLoad="window.print()">

<style type="text/css">
    body
    {
        font-family: sans-serif;
        font-size: 14px;
    }
    th{
        padding: 5px;
        font-weight: bold;
        font-size: 12px;
    }
    td{
        font-size: 12px;
    }
    h2{
        text-align: left;
        margin-bottom: 13px;
    }
    .potong
    {
        page-break-after:always;
    }
</style>

<table width="970" border="0">
  <tr>
    <td width="557">&nbsp;</td>
  </tr>
  <tr>
    <td ><div align="center" class="style2"><strong>LAPORAN DIKLAT </strong></div></td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
  </tr>
</table>
<hr>
<table width="970" border="1" class="table table-striped table-bordered table-hover" id="example-datatables">
  <thead>
    <tr>
      <th width="7">Nomor</th>
      <th>NIP </th>
      <th>Nama Diklat </th>
      <th>Penyelenggara </th>
      <th>Nomor STTP </th>
      <th>Tanggal STTP </th>
    </tr>
    <?php
    $i=1;
  	$sql = "SELECT * FROM diklat";

    $record=$this->db->query($sql)->result();

    foreach ($record as $r)
    {
	?>
  	<tr>
       	<td><?php echo $i;?>
  		<td><?php echo $r->nip?></td>
    	<td><?php echo $r->namadiklat?></td>
    	<td><?php echo $r->penyelenggara?></td>
    	<td><?php echo $r->nosttp?></td>
    	<td><?php echo $r->tgl_sttp?></td>
   	</tr>
  <?php $i++;}?>
</table>

