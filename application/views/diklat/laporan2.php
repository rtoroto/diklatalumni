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
      <li><?=anchor('diklat/','Diklat')?></li>
      <li><?=anchor('diklat/laporan2','Laporan')?></li>
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
            <?php
 if($this->session->userdata('level')==1){
	 
						 echo form_open('diklat/laporan2');
						 $js = array(
              
);
echo " <div class=\"form-group\">
	 ";
echo '<div class="col-sm-4">';
echo form_dropdown('instansi',$dd_instansi,'ALL',  'class="form-control"');
//						 echo form_dropdown('instansi');
echo " </div></div>";
echo " <div class=\"form-group\">
	 ";
						 echo form_open('diklat/laporan');
						 $js = array(
              
);
echo '<div class="col-sm-4">';
echo form_dropdown('jenis_diklat',$dd_jenis_diklat,'ALL',  'class="form-control" ');
//						 echo form_dropdown('instansi');
echo " </div></div>";
						// echo form_close();
 } 
						 ?> 
               
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary" onClick="submit()">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
		echo $nama_instansi."<br>";
				echo $namadiklat."<br>";
		?>
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
	  url: "<?=site_url('diklat/laporan_json/'.$instansi.'/'.$jenis_diklat)?>",
	  type:'POST',
	}
});

</script>


</body>
</html>