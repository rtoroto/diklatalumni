<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
<?php
echo anchor($this->uri->segment(1).'/post',"<i class='fa fa-pencil-square-o'></i> Tambah Data",array('class'=>'btn btn-danger   btn-sm','title'=>'Tambah Data'))
?>
<table id="lookup" class="table table-bordered table-hover">  
               <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  <th></th>
                                        <th>No</th>
                                        
	                                    <th>Nip </th>
                                        <th>Nama </th>
                                        <th>Pangkat/Golongan</th>
                                        <th>Instansi </th>
	                                    <th>Nama Diklat</th>
	                                    <th class="text-center"> Penyelenggara </th> 
                                        <th>No STTP</th>
	                                    <th class="text-center">Tgl STTP </th> 
                                        <th class="text-center">Nama Proper </th> 
	   <th class="text-center">File STTP </th> 
                                       </tr>
                                      </thead>
                                        <tbody>
                                         <?php
                            $i=1;
                            foreach ($record as $r)
                            {
                            ?>
                            
                            <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->nosttp;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->nosttp;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>                                                                            </div>                                </td>
                                        
                                <td><?php echo $i;?></td>
                                
                                <td><?php echo $r->nip?></td>
                                 <td><?php echo $r->nama?></td>
                                 <td><?php echo $r->pangkat?>/<?=$r->gol?></td><td><?php echo $r->nama_instansi?></td>
                                 <td><?php echo $r->namadiklat?></td>
                                 <td><?php echo $r->penyelenggara?></td>
                                 <td><?php echo $r->nosttp?></td>
                                <td><?php echo $r->tgl_sttp?></td>
                               
                                <td><a href="<?php echo site_url('upload/'.$r->full_path)?>"> <?php echo $r->judullapproper?></a></td>
                               
                    			
                              
                    			<td>
                                  <a href="<?php echo site_url('upload/'.$r->filesttp)?>" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-save-file"></span> <i class="fa fa-file"></i>
        </a></td>
							</tr>
                            <?php $i++;}?>
                                        </tbody>
                                    </table>
                    <!-- END Datatables -->
                    