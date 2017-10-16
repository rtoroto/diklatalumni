<!DOCTYPE html>
<html>
<head>
	

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>">

<style type="text/css">

.container{
	margin-top: 10px;
}

</style>

</head>
<body>
 <!-- Fixed navbar -->
    <nav class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#"><img height="50px" src="<?=site_url('uadmin/img/logodg.png')?>"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
           
            <li class="active"><?=anchor('auth/login','Login');?> </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
  
<div class="container">
<div class="row">
<div class="col-md-12">
  
  <p></p>
  <p></p>
  <p></p> 
<h2>DATA DIKLAT</h2>
<table class="table table-striped table-desa">
<thead>
<tr><th style="width:50px">No</th>

<th>Nama</th>
<th>Nama Proper</th>
<th>File Proper</th>

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
	  url: "<?php echo base_url('index.php/diklat/view_proper_publik') ?>",
	  type:'POST',
	}
});

</script>


</body>
</html>