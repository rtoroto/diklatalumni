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
echo form_open_multipart('diklat/simpan_post/');
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
       <th colspan="2">DATA DIKLAT </th>
     </tr>
      
      
      <tr>
        <td>NIP</td>
        <td><?php
  		$atribut_popup = array(
            'width' => '400',
            'height' => '550',
            'scrollbars' => 'yes',
			'status' => 'no',
            'resizable' => 'no',
            'screenx' => '100',
            'screeny' => '30',
			'class'=>'btn btn-warning'
			
        );
		?>
		<?php
		$seting_nip=array('name'=>'nip','id'=>'nip','size'=>'4','class'=>'form-control input-sm-1');	
		//echo form_input($seting_nip);
		?>
		<?php
		$seting_nama=array('name'=>'nama','id'=>'nama','size'=>'4','class'=>'form-control input-sm-4');	
		//echo form_input($seting_nama);
		?>
		<?php
		echo $nip;
		echo form_hidden('nip',$nip);
		echo anchor(base_url().'diklat/tampil_peserta','<span class="glyphicon glyphicon-search"></span> Pilih Peserta',$atribut_popup);
		?>		</td>
      </tr>
     
      <tr>
        <td>Nama Pegawai </td>
        <td><?=$nama?></td>
      </tr>
    <tr>
        <td>Golongan </td>
        <td><?=$gol?></td>
      </tr>
       <tr>
        <td>Instansi</td>
        <td><?=$instansi?></td>
      </tr>
       <tr>
        <td>Jenis Diklat </td>
        <td><?php //echo $jenis_diklat;
		$class      ="class='form-control' id='jenis_diklat'";
		 echo form_dropdown('jenis_diklat',$dd_jenis,'',$class);?></td>
      </tr>
      <tr>
        <td>Nama Diklat </td>
        <td><?php echo inputan('text', 'namadiklat','col-sm-6','Nama Diklat ..', 1, '','');?></td>
      </tr>
        <tr>
          <td>Tanggal Mulai Diklat </td>
          <td><?php echo inputan('text', 'tglmulai','col-sm-4','Tanggal Mulai Diklat ..', 0, '',array('id'=>'datepicker2'));?></td></tr>
        <tr>
          <td>Tanggal Selesai Diklat </td>
          <td><?php echo inputan('text', 'tglselesai','col-sm-4','Tanggal Selesai Diklat ..', 0, '',array('id'=>'datepicker3'));?></td>
        </tr>
        <tr>
        <td>Tempat Diklat </td>
        <td>
        <?php echo inputan('text', 'tempatdiklat','col-sm-6','Tempat Diklat ..', 1, '',''); ?></td>
       </tr>
       <tr>
        <td>Penyelenggara Diklat </td>
        <td><?php echo inputan('text', 'penyelenggara','col-sm-6','Penyelenggara Diklat ..', 1, '',''); ?></td>
        </tr>
        <tr>
          <td>Angkatan</td>
          <td><?php echo inputan('text', 'angkatan','col-sm-2','Angkatan ..', 1, '','');?></td>
        </tr>
        <tr>
          <td>Jumlah Jam </td>
          <td><?php echo inputan('text', 'jml_jam','col-sm-2','Jumlah Jam ..', 1, '','');?></td>
        </tr>
        <tr>
          <td>No STTP </td>
          <td><?php echo inputan('text', 'nosttp','col-sm-2','No STTP ..', 1, '','');?></td>
        </tr>
        <tr>
          <td>Tanggal STTP</td>
          <td><?php echo inputan('text', 'tgl_sttp','col-sm-2','Tanggal STTP ..', 0, '',array('id'=>'datepicker1'));?></td>
        </tr>
        <?php
		if($jenis_diklat=="DS"){
		?>
        <tr>
          <td >Judul Laporan Proper </td>
          <td><?php echo inputan('text', 'judullapproper','col-sm-8','Judul Laporan Proper ..', 1, '','');?>
          <?php
		echo $this->session->flashdata('msg'); 
		
		?></td>
        </tr>
       
        <tr>
          <td>File Proper</td>
          <td><?=form_upload('file_name2');?></td>
        </tr>
        
        <?php
		}
		?>
         <tr>
          <td>File STTP</td>
          <td><?php echo form_upload('file_name1')?></td>
        </tr>
      </table>
                
      </div>
  	<div class="tab-pane" id="walisiswa"></div>
 <div class="tab-pane" id="institusi"></div>
</div>
 </div>

  <p>
  <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
  <?php
  echo form_close();
  ?>
  <script type="text/javascript">
  function cetak() {
    var nama = document.getElementById('nama').value;
    var alamat = document.getElementById('alamat').value;
    
    alert("nama  :" +nama+"  alamat : " + alamat);
    
    
    }
	
	$('#jenis_diklat').bind('change', function () { // bind change event to select

        var jenis_diklat = $(this).val(); // get selected value

        if (jenis_diklat != '') { // require a URL
           // window.location.replace('<?=$nip?>'+jenis_diklat); // redirect
		   var url="<?php
			 	  echo site_url('diklat/post/'.$nip.'/'); ?>"
			 window.location.href =url+"/"+jenis_diklat ;
        }
        return false;
    });
	</script>
    
    <script>
    
</script>
  