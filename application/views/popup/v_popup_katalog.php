<!DOCTYPE html>
<html lang="en">
<head>
<title>Katalog Buku</title>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
<table width="500" border="1" align="center">
<!-- Baris ke1-untuk KOP-->
<tr height="50" align="center"><td><h2>KATALOG BUKU</h2></td></tr>

<!-- baris ke 2 : untuk body -->
<tr height="200"><td>
<!--Tabel anak untuk data buku-->
	<table width="90%" align="center">
	<tr><td width="140">Kode Buku</td><td>: <?php echo $buku['kode_buku'];?></td><tr>
	<tr valign="center"><td>Judul Buku</td><td>: <?php echo $buku['judul_buku'];?></td><tr>
	<tr><td>Pengarang</td><td>: <?php echo $buku['nama_pengarang'];?></td><tr>
	<tr><td>Penerbit</td><td>: <?php echo $buku['nama_penerbit'];?></td><tr>
	<tr><td>Tahun Terbit</td><td>: <?php echo $buku['tahun_terbit'];?></td><tr>
	<tr><td>Tanggal Diterima</td><td>: <?php echo $buku['tanggal_diterima'];?></td><tr>
	</table>
<!-- akhir tabel data buku-->
</td></tr>


<!-- baris ke 3 : untuk footer -->
<tr align="center"><td><i><small>Printed By SisoPustaka &copy; 2015</small><i></td></tr>
</table>
</body>
</html>