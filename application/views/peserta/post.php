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
       <th colspan="2">DATA PESERTA </th>
     </tr>
      <tr>
        <td width="150">NIP</td>
        <td><?php echo inputan('text', 'nip','col-sm-2','NIP ..', 1, '','');?></td>
	   </tr>
		<tr>
		  <td width="150">Nama Peserta </td>
		<td>
		<?php  echo inputan('text', 'nama','col-sm-6','Nama Peserta ..', 0, '','');?>
		</td></tr>
        <tr>
          <td>Golongan</td>
        <td>
        <?php echo inputan('text', 'gol','col-sm-6','Golongan ..', 0, '','');?></td></tr>
        <tr>
          <td>Pangkat</td>
          <td><?php echo inputan('text', 'pangkat','col-sm-6','Pangkat ..', 0, '','');?></td>
        </tr>
          <tr>
    <td width="150">Instansi</td>
    <td>
        <div class="col-sm-3">
        <?php
		$class      ="class='form-control' id='instansi'";
		 echo form_dropdown('instansi',$dd_instansi,'',$class);?>
        </div>
        
        
    </td>
    </tr>
   
      </table>
                
    </div>
  	<div class="tab-pane" id="walisiswa"></div>
 <div class="tab-pane" id="institusi"></div>
</div>
 </div>

<input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
</form>

