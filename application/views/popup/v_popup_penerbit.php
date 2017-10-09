<!DOCTYPE html>
<html lang="en">
  <head>
<title>Daftar produk</title>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>bootstrap/navbar.css" rel="stylesheet">

<script>
<!--

function insert_kode_penerbit(kode_penerbit) {
		opener.document.forms['form-buku'].kode_penerbit.value  +=kode_penerbit;
		        
     
}


function insert_nama_penerbit(nama) {
	opener.document.forms['form-buku'].nama_penerbit.value  +=nama;
	}


	
function kosongkan_entitas_penerbit() {
 opener.document.forms['form-buku'].kode_penerbit.value ="";
 opener.document.forms['form-buku'].nama_penerbit.value ="";
}  

</script>	
</head>
<body>
<div id="body">
<div class="container">

<div class="row">
<div class="col-sm-6">
<div class="panel panel-primary">


<?php
	$tampilan_tabel=array('table_open'=>'<table  class="table table-striped table-bordered table-condensed table-hover">'
	);
	$this->table->set_template($tampilan_tabel);

$this->table->set_heading('Kode','Nama penerbit');

if(isset($penerbit)){
foreach($penerbit as $data_penerbit){
$this->table->add_row(
'<a href="javascript:kosongkan_entitas_penerbit();insert_nama_penerbit(\''.addslashes($data_penerbit['nama_penerbit']).'\');insert_kode_penerbit(\''.$data_penerbit['kode_penerbit'].'\');window.close();">'.$data_penerbit['kode_penerbit'].'</a>',
$data_penerbit['nama_penerbit']
);
}
}
echo $this->table->generate();
echo '</div>';
echo $halaman;
?>
<a href="javascript:window.close()"><button type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-remove"></span>Tutup</button>
			</a>
</div>
</div>
</div>
</body>
</html>