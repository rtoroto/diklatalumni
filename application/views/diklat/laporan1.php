
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <!-- css table datatables/dataTables -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>/datatables/dataTables.bootstrap.css"/>
    
         <link type="text/css" href="<?=base_url('assets/')?>/css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="<?=base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">         
        <link type="text/css" href="<?=base_url('assets/')?>/datatables/buttons.dataTables.min.css" >
        <link type="text/css" href="<?=base_url()?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/themes.css">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            
            
      
    </head>
<body>
         <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="fa fa-bars"></span>
                            </button>
                          
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                               <!-- <li class="active"><a href="javascript:void(0)"> <i class="fa fa-barcode"></i> Link</a></li>-->
                                <?php

                                $mainmenu=$this->db->get_where('mainmenu',array('aktif'=>'y','level'=>$this->session->userdata('level')))->result();
                                foreach ($mainmenu as $m)
                                {
                                    // chek sub menu
                                    $submenu=$this->db->get_where('submenu',array('id_mainmenu'=>$m->id_mainmenu,'aktif'=>'y'));
                                    if($submenu->num_rows()>0)
                                    {
                                        //looping
                                        echo "<li class='dropdown'>
                                    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'> <i class='".$m->icon."'></i> ".  strtoupper($m->nama_mainmenu)." <b class='caret'></b></a>
                                    <ul class='dropdown-menu'>";
                                        foreach ($submenu->result() as $s)
                                        {
                                            echo "<li>".  anchor($s->link,  '<i class="'.$s->icon.'"></i> '.strtoupper($s->nama_submenu))."</li>";
                                        }
                                    echo"</ul>
                                </li>";
                                        // end looping
                                    }
                                    else
                                    {
                                        echo "<li>".  anchor($m->link,  '<i class="'.$m->icon.'"></i> '.strtoupper($m->nama_mainmenu))."</li>";
                                    }
                                }
                                ?>
                           
                            </ul>
                            
                        </div>
                    </nav>
                   

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
             
                                  <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-user"></i> Laporan Data <?=$nama_instansi?></h3> 
                        </div>
                        <div class="panel-body">
                        
                       <div align="right"> <em  style="vertical-align:auto; font-size:10px">ketikan nama instansi atau jenis diklat kolom cari </em></div>
                         <div align="left" style="float:left" class="dropdown"> <em  style="vertical-align:auto; font-size:10px">Pilih Nama Instansi<?php
						 echo form_open('diklat/laporan');
						 $js = array(
              
);
echo form_dropdown('instansi',$dd_instansi,'ALL',  'class="dropdown" onChange= submit();');
//						 echo form_dropdown('instansi');
						 echo form_close();
						 ?> </em></div><br>
<table id="lookup" class="table table-bordered table-hover">  
               <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
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
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
    <script src="<?=base_url()?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
<script src="<?=base_url('assets/')?>/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url('assets/')?>/datatables/dataTables.bootstrap.js"></script>

<script src="<?=base_url('assets/')?>/datatables/jquery-1.12.4.js"></script>
<script src="<?=base_url('assets/')?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/buttons.flash.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/jszip.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>/datatables/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>/datatables/buttons.html5.min.js"></script>


<script src="<?=base_url('assets/')?>/datatables/buttons.print.min.js"></script>

<script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"<?=site_url('diklat/laporan_json/'.$instansi)?>", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
      
</body>
