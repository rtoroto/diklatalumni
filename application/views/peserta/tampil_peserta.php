<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISFO DATA ALUMNI DIKLAT v1.0</title>
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/plugins.css">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/themes.css">
        <script src="<?php echo base_url()?>uadmin/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
</head>

<body><h3>
<?=$title?></h3>
<table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th width="7">Nomor</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Pangkat</th>
                                <th>Instansi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($record as $r)
                            {
                            ?>
                            
                            <tr>
                                
                                <td><?php echo $i;?></td>
                                <td><?php echo anchor('diklat/post/'.$r->nip,$r->nip);?></td>
                                <td><?php echo $r->nama?></td>
                                <td><?php echo $r->gol?></td>
                                <td><?php echo $r->pangkat?></td>
                                <td><?php $this->load->helper('diklat');
								$nm_instansi=getinstansi($r->instansi);
								echo $nm_instansi;?></td>
                            </tr>
                            <?php $i++;}?>
                        </tbody>
                    </table>
</body>
</html>