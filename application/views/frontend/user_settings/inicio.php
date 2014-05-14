<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>media/css/bootstrap-user.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?= base_url()?>media/css/sb-admin-user.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>media/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
		<a href="<?= base_url()?>index.php/inicio" title="Tornar">
        <div class="navbar-header">
			&nbsp;&nbsp;<img src="<?= base_url()?>media/images/frontend/volver.png" />&nbsp;&nbsp;TORNAR
        </div>
		</a>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav side-nav">
            <li class="active"><a href="index.html"><i class="fa fa-certificate"></i>&nbsp;&nbsp;SERVEIS</a></li>
            <li><a href="charts.html"><i class="fa fa-certificate"></i>&nbsp;&nbsp;SOLICITUTS</a></li><!--fa-users-->
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $email?>&nbsp;&nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Opcions</a></li>
                <li class="divider"></li>
                <li><a href="<?= base_url()?>index.php/logout"><i class="fa fa-power-off"></i>&nbsp;Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="<?= base_url()?>media/js/jquery-1.10.2.js"></script>
    <script src="<?= base_url()?>media/js/bootstrap.js"></script>

  </body>
</html>
