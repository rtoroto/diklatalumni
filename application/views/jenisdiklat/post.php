<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
 
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"> </script>

<script>
$(document).ready(function(){
          loadjurusan();  
  });
</script>

<script type="text/javascript">
function loadjurusan()
{
     var prodi=$("#prodi").val();   
      $.ajax({
	url:"<?php echo base_url();?>siswa/tampilkankonsentrasi",
	data:"prodi=" + prodi ,
	success: function(html)
	{
            $("#konsentrasi").html(html);
             var konsentrasi=$("#konsentrasi").val();
	}
	});
}
</script>
<script>
$(document).ready(function(){
  $("#prodi").change(function(){
     
        loadjurusan();
  });
});
</script>
<?php
echo $this->session->flashdata('pesan');
echo form_open_multipart($this->uri->segment(1).'/post');
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
 <div class="row">
<div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
</div>
  <div class="col-md-12 clearfix">
  	<div class="tab-content"><div class="tab-pane active" id="biodata">
     <table class="table table-bordered">
     <tr class="success">
       <th colspan="2">DATA JENIS DIKLAT </th>
     </tr>
      <tr>
        <td width="150">Kode Jenis Diklat</td>
        <td><?php echo inputan('text', 'kode_diklat','col-sm-2','Kode Jenis Diklat ..', 1, '','');?></td>
	   </tr>
		<tr>
		  <td width="150">Nama Diklat </td>
		<td>
		<?php  echo inputan('text', 'nama_diklat','col-sm-6','Nama Diklat ..', 0, '','');?>		</td></tr>
        <tr>
          <td>Keterangan</td>
        <td>
        <?php echo inputan('text', 'keterangan','col-sm-6','Keterangan ..', 0, '','');?></td></tr>
      </table>
                
    </div>
  	<div class="tab-pane" id="walisiswa"></div>
 <div class="tab-pane" id="institusi"></div>
</div>
 </div>

<input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
</form>

