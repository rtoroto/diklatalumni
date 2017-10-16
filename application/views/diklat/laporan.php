<html>
 	<head>
             
   
 <script src="<?=base_url('assets/')?>/datatables/dataTables.bootstrap.js"></script>

<script src="<?=base_url('assets/')?>/datatables/jquery-1.12.4.js"></script>
 <link type="text/css" href="<?=base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
 <link type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
 <link type="text/css" href="<?=base_url('assets/')?>/datatables/buttons.dataTables.min.css" >        
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themes/base/jquery.ui.all.css">
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
                            <ul class="nav navbar-nav navbar-right">
                              
                                <li class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo strtoupper($this->session->userdata('username'));?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('users/profile',"<i class='fa fa-cogs'></i> Account");?></li>
                                        <li><?php echo anchor('auth/logout',"<i class='fa fa-sign-out'></i> Logout");?></li>
     
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
<h2 style="font-weight: normal;">Laporan Data <?=$nama_instansi?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li>LAPORAN</li>

    </ol>
</div>
 <div class="row">

        <div class="col-md-12">
 <div align="left" style="float:left" class="dropdown"> <em  style="vertical-align:auto; font-size:12px">
 

 
 <?php
 if($this->session->userdata('level')==1){
	 echo " <div class=\"form-group\">
	 <label for=\"email\">Pilih Nama Instansi :</label> ";
						 echo form_open('diklat/laporan');
						 $js = array(
              
);
echo form_dropdown('instansi',$dd_instansi,'ALL',  'class="form-control" onChange= submit();');
//						 echo form_dropdown('instansi');
echo " </div>";
echo " <div class=\"form-group\">
	 <label for=\"email\">Pilih Nama Instansi :</label> ";
						 echo form_open('diklat/laporan');
						 $js = array(
              
);
echo form_dropdown('instansi',$dd_jenis_diklat,'ALL',  'class="form-control" onChange= submit();');
//						 echo form_dropdown('instansi');
echo " </div>";
						 echo form_close();
 } 
						 ?> </em></div>
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
                    <!-- END Datatables -->
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

<script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					dom: 'Brf | tip',
        buttons: [
           'excel', 'pdf', 'print'
			
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
      
        </div>
        </div>
        <body>
                        </html>