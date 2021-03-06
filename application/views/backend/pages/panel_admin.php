 <!-- Principal-->
  <div id="page-wrapper">

  <div class="row">
      <div class="col-lg-12">
        <h1><b>Panell d'administració<b></h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Panell d'administració</li>
        </ol>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Benvingut, administrador.
        </div>
      </div>
    </div>
  <!-- Panel: Llista les denuncies-->
  	<div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-tasks fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"></p>
                <!--la ultima denuncia actualitzem la data-->
                <p class="announcement-text"></p>
              </div>
            </div>
          </div>
          <a href="<?= base_url()?>index.php/admin/denuncies">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Llistar denúnices
                </div>
				
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
  <!-- Panel: Congelar Usuaris-->
        <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-ban fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"></p>
                  </div>
                </div>
              </div>
              <a href="<?= base_url()?>index.php/admin/congelarusuaris">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Gestionar usuaris
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
  <!-- Panel: Crear Categories de Serveis-->
      <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-edit fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"></p>
                  </div>
                </div>
              </div>
              <a href="<?= base_url()?>index.php/admin/crearcategories">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Gestionar categories
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-cog fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"></p>
                  </div>
                </div>
              </div>
              <a href="<?= base_url()?>index.php/admin/configSaldo">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-7">
                      Configurar el sistema
                    </div>
                    <div class="col-xs-5 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
  </div> <!-- /#page-wrapper : acaba principal -->