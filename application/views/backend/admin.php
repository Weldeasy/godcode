<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Godcode Time Bank">
    <meta name="author" content="Godcode">

    <title>Bank Time Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>media/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url();?>media/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>media/font-awesome/css/font-awesome.min.css">
  
    
    <!-- JavaScript -->
    <script src="<?php echo base_url();?>media/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>media/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- JQUERY -->
    <script src="<?php echo base_url();?>media/jquery/jquery-1.9.1.min.js"></script>
     <script src="<?php echo base_url();?>media/jquery/admin.js"></script>

     <!-- JEASYUI-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/easyui/themes/icon.css">
    <script type="text/javascript" src="<?php echo base_url();?>media/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>media/easyui/jquery.easyui.min.js"></script>

    <script id="script-lang" type="text/javascript" src="<?php echo base_url();?>media/easyui/locale/easyui-lang-ca.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>media/easyui/datagrid-detailview.js"></script>
  </head>
  <body>
    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
     	<ul class="nav navbar-nav side-nav">
			  <li id='inici'><a href="<?= base_url()?>index.php/admin/"><i class="fa fa-dashboard"></i> Panell d'administraci&oacute;</a></li> 
			  <li id='llistarDenuncies'><a href="<?= base_url()?>index.php/admin/denuncies"><i class="fa fa-bar-chart-o"></i> Llistar denúnices</a></li>
			  <li id='congelarUsuaris'><a href="<?= base_url()?>index.php/admin/congelarusuaris"><i class="fa fa-ban"></i> Congelar usuaris</a></li>
			  <li><a href="<?= base_url()?>index.php/admin/crearcategories"><i class="fa fa-edit"></i> Gestió de categories</a></li>
			  <li><a href="<?= base_url()?>index.php/admin/configSaldo"><i class="fa fa-cog"></i> Configuracions del sistema</a></li>
			  <li><a href="<?= base_url()?>index.php/admin/estadistiques"><i class="fa fa-caret-square-o-down"></i> Estadístiques </a></li>     
         </ul>   
               <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $email; ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li> <a  href="<?= base_url()?>index.php/inicio"><i class="fa fa-bar-chart-o"></i> Tornar</a></li>
                 <li> <a  href="<?= base_url()?>index.php/admin"><i class="fa fa-dashboard"></i> Panell d'administració</a></li>
                 <li><a class="logout_b" title="Tancar sessio" href="<?= base_url()?>index.php/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
       
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php echo $panel_admin ?>
    </div><!-- /#wrapper -->
  </body>

</html>
