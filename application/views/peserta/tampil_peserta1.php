<!DOCTYPE html>
<html>
<head>
	

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>">

<style type="text/css">

.container{
	margin-top: 50px;
}

</style>

</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-9">

<table class="table table-striped table-desa">
<thead>
<tr><th style="width:50px">No</th>
<th>NIP</th>
<th>Nama</th>
<th>Pangkat/Gol</th>
<th>Instansi</th>
</tr>
</thead>
</table>

</div>
</div>
</div>



<script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">

$(".table-desa").DataTable({
	ordering: false,
	processing: true,
	serverSide: true,
	ajax: {
	  url: "<?php echo base_url('index.php/peserta/tampil_peserta_json') ?>",
	  type:'POST',
	}
});

</script>


</body>
</html>