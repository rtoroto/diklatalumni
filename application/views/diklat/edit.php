<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
     <?php
echo form_open($this->uri->segment(1).'/edit');
//$jenjang    =array('d1'=>'D1','d2'=>'D2','d3'=>'D3','d4'=>'D4','s1'=>'S1');
echo "<input type='hidden' name='nosttp' value='$r[nosttp]'>";
//$semester   =array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8);
$class      ="class='form-control'";
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Record</h3>
  </div>
  <div class="col-md-12 clearfix">
    <div class="tab-content">
      <div class="tab-pane active" id="biodata">
        <table class="table table-bordered">
          
          <tr class="success">
            <th colspan="2">DATA DIKLAT </th>
          </tr>
          <tr>
            <td width="150">NIP</td>
            <td><?php //echo inputan('text', 'nip','col-sm-2','NIP ..', 1, $r['nip'],'');?> <?php
			echo form_hidden('nip',$r['nip']);
			?> <?=$r['nip']?></td>
          </tr>
           <tr>
        <td>Nama Pegawai </td>
        <td><?=$r['nama']?></td>
      </tr>
    <tr>
        <td>Golongan </td>
        <td><?=$r['gol']?></td>
      </tr>
          <tr>
            <td>Nama Diklat </td>
            <td><?php echo inputan('text', 'namadiklat','col-sm-6','Nama Diklat ..', 1, $r['namadiklat'],'');?></td>
          </tr>
          <tr>
            <td>Tanggal Mulai Diklat </td>
            <td><?php echo inputan('text', 'tgl_sttp','col-sm-4','Tanggal Mulai Diklat ..', 0, $r['tglmulai'],array('id'=>'datepicker2'));?></td>
          </tr>
          <tr>
            <td>Tanggal Selesai Diklat </td>
            <td><?php echo inputan('text', 'tgl_sttp','col-sm-4','Tanggal Selesai Diklat ..', 0, $r['tglselesai'],array('id'=>'datepicker3'));?></td>
          </tr>
          <tr>
            <td>Tempat Diklat </td>
            <td><?php echo inputan('text', 'tempatdiklat','col-sm-6','Tempat Diklat ..', 1, $r['tempatdiklat'],'');?></td>
          </tr>
          <tr>
            <td>Penyelenggara Diklat </td>
            <td><?php echo inputan('text', 'penyelenggara','col-sm-6','Penyelenggara Diklat ..', 1, $r['penyelenggara'],'');?></td>
          </tr>
          <tr>
            <td>Angkatan</td>
            <td><?php echo inputan('text', 'angkatan','col-sm-6','Angkatan ..', 1, $r['angkatan'],'');?></td>
          </tr>
          <tr>
            <td>Jumlah Jam </td>
            <td><?php echo inputan('text', 'jml_jam','col-sm-2','Jumlah Jam ..', 1, $r['jml_jam'],'');?></td>
          </tr>
          <tr>
            <td>No STTP </td>
            <td><?php echo inputan('text', 'nosttp','col-sm-2','No STTP ..', 1, $r['nosttp'],'');
			
			echo form_hidden('id',$r['id_diklat']);
			?></td>
          </tr>
          <tr>
            <td>Tanggal STTP </td>
            <td><?php echo inputan('text', 'tgl_sttp','col-sm-2','Tanggal STTP ..', 0, $r['tgl_sttp'],array('id'=>'datepicker1'));?></td>
          </tr>
          <tr>
          <td >Judul Laporan Proper </td>
          <td><?php echo inputan('text', 'judullapproper','col-sm-8','Judul Laporan Proper ..', 0,  $r['judullapproper'],'');?>
          <?php
		echo $this->session->flashdata('msg'); 
		
		?></td>
        </tr>
       
        <tr>
          <td>File Proper</td>
          <td><?=form_upload('file_name2');
		  echo  $r['full_path']?></td>
        </tr>
         <tr>
          <td>File STTP</td>
          <td><?php echo form_upload('file_name1');
		   echo  $r['filesttp']?></td>
        </tr>
        </table>
        <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
      </div>
      <div class="tab-pane" id="walisiswa"></div>
      <div class="tab-pane" id="institusi"></div>
    </div>
  </div>
</div>
</form>