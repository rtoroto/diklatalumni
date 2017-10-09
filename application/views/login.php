<!DOCTYPE html>
<html>
  <head>
    <title>SISFO DATA ALUMNI DIKLAT v1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
     <style>
		.btn-file {
		    position: relative;
		    overflow: hidden;
		}
		.btn-file input[type=file] {
		    position: absolute;
		    top: 0;
		    right: 0;
		    min-width: 100%;
		    min-height: 100%;
		    font-size: 999px;
		    text-align: right;
		    filter: alpha(opacity=0);
		    opacity: 0;
		    background: red;
		    cursor: inherit;
		    display: block;
		}
		input[readonly] {
			background-color: white !important;
			cursor: text !important;
		}
	.style1 {font-family: "Courier New", Courier, monospace}
     .style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
}
     </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <table width="750" border="0" align="center">
    <tr>
      <td width="103">&nbsp;</td>
      <td width="637"><h2 align="center" class="style2"><strong>SISTEM INFORMASI DATA ALUMNI DIKLAT</strong></h2>
      </td>
    </tr>
  </table>
  <nav class="navbar navbar-default" role="navigation"><div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>    </button>
    <div align="center"><a class="navbar-brand" href="#"></a></div>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  
</nav>
      <div class="container">
          <div class="col-md-3">
            <div align="center" class="style1"></div>
          </div>
          <div class="col-md-5">
              <?php
              echo form_open('auth/login');
              ?>
              <table width="268" class="table table-bordered">
              <tr><td width="83">Username</td>
              <td width="196">  
                      <div class="input-group">
                          <input type="text" name="username" required placeholder="Username ..." autofocus class="form-control">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div></td></tr>
              <tr><td>Password</td><td> <div class="input-group">
                          <input type="password" name="password" placeholder="Password" required class="form-control">
  <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
</div></td></tr>
             
             
              <tr><td></td><td><input type="submit" name="submit" value="Login" class="btn btn-danger"></td></tr>
          </table>   
          </form>
        </div>    
           <div class="col-md-3"></div>
           
  </div>
      
      <hr>
      <p align="center">SISTEM INFORMASI DATA ALUMNI DIKLAT VER 1.0 | Hery Susanto Software</p>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/1.8.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/icon.jpg">
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.datepicker.js"></script>
	
        	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
                changeMonth: true,
                dateFormat: 'yy-mm-dd',
                changeYear: true
                });

                $( "#datepicker1" ).datepicker({
                changeMonth: true,
                dateFormat: 'yy-mm-dd',
                changeYear: true
                });

                $( "#datepicker2" ).datepicker({
                changeMonth: true,
                dateFormat: 'yy-mm-dd',
                changeYear: true
                });
	});
	</script>
  </body>
</html>