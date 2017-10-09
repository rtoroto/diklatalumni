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
echo "<input type='hidden' name='kode_instansi' value='$r[kode_instansi]'>";
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
            <th colspan="2">DATA INSTANSI </th>
          </tr>
          <tr>
            <td width="150">Kode Instansi</td>
            <td><?php echo inputan('text', 'kode_instansi','col-sm-2','Kode Instansi ..', 1, $r['kode_instansi'],'');?></td>
          </tr>
          <tr>
            <td width="150">Nama Instansi </td>
            <td><?php echo inputan('text', 'nama_instansi','col-sm-6','Nama Instansi ..', 1, $r['nama_instansi'],'');?></td>
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