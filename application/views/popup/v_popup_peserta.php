<!DOCTYPE html>
<html lang="en">
  <head>
<title>Daftar peserta</title>
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

function insert_nip(nip) {
		opener.document.forms['form-diklat'].nip.value  +=nip;
		        
     
}


function insert_nama(nama) {
	opener.document.forms['form-diklat'].nama.value  +=nama;
	}


	
function kosongkan_entitas_peserta() {
 opener.document.forms['form-diklat'].nip.value ="";
 opener.document.forms['form-diklat'].nama.value ="";
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

$this->table->set_heading('NIP','Nama');

if(isset($peserta)){
foreach($peserta as $data_peserta){
$this->table->add_row(
'<a href="javascript:kosongkan_entitas_peserta();insert_nama_peserta(\''.addslashes($data_peserta['nama']).'\');insert_nip(\''.$data_peserta['nip'].'\');window.close();">'.$data_peserta['nip'].'</a>',
$data_peserta['nama']
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