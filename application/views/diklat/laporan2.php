<!DOCTYPE html>
<html>
<head>
	

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" type="text/css" href="Https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">  
<link rel="stylesheet" type="text/css" href="Https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">  
<style type="text/css">

.container{
	margin-top: 10px;
}

</style>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Diklat</a></li>
      <li><a href="#">laporan</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
    
  
<div class="container">
<div class="row">
<div class="col-md-12">
  
<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >Custom Filter : </h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                   
                    <div class="form-group">
                        <label for="FirstName" class="col-sm-2 control-label">Jenis Diklat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="FirstName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">Instansi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="LastName">
                        </div>
                    </div>
                 
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<table class="table table-striped table-desa">
<thead>
<tr> <tr>
	  
                                        <th>No</th>
	                                    <th>Nip </th>
                                        <th>Nama </th>
                                        <th>Pangkat/Golongan</th>
                                        <th>Instansi </th>
	                                    <th>Nama Diklat</th>
	                                    <th class="text-center"> Penyelenggara </th> 
                                        <th>No STTP</th>
	                                    <th class="text-center">Tgl STTP </th> 
	  
                                       </tr>

</tr>
</thead>
</table>

</div>
</div>
</div>


 <script src="<?=base_url()?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
<script src="<?=base_url('assets/')?>/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url('assets/')?>/datatables/dataTables.bootstrap.js"></script>

<script src="<?=base_url('assets/')?>/datatables/jquery-1.12.4.js"></script>
<script src="<?=base_url('assets/')?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/dataTables.buttons.min.js"></script>

<script src="<?=base_url('assets/')?>/datatables/jszip.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>/datatables/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/buttons.print.min.js"></script>



<script type="text/javascript">

$(".table-desa").DataTable({
	dom: 'Brf | tip',
        buttons: [
           'excel', 'pdf', 'print'
			
			        ],
	ordering: false,
	processing: true,
	serverSide: true,
	
	ajax: {
	  url: "<?=site_url('diklat/laporan_json/'.$instansi)?>",
	  type:'POST',
	}
});

</script>


</body>
</html>