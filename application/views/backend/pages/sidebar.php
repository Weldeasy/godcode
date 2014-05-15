<ul class="nav navbar-nav side-nav">
  <li id='inici' class="active"><a href="<?= base_url()?>index.php/admin/"><i class="fa fa-dashboard"></i> Inici</a></li> 
  <li id='llistarDenuncies'><a href="<?= base_url()?>index.php/admin/denuncies"><i class="fa fa-bar-chart-o"></i> Llistar Denúnices</a></li>
  <li id='congelarUsuaris'><a href="<?= base_url()?>index.php/admin/congelarusuaris"><i class="fa fa-ban"></i> Congelar Usuaris</a></li>
  <li><a href="<?= base_url()?>index.php/admin/crearcategories"><i class="fa fa-edit"></i> Crear Categoria</a></li>
  <li><a href="<?= base_url()?>index.php/admin/configSaldo"><i class="fa fa-cog"></i> Parametritzar el saldo minim</a></li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Estadístiques <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="<?= base_url()?>index.php/admin/zona">Zona geogràfica</a></li>
      <li><a href="<?= base_url()?>index.php/admin/numServeis">Numero de serveis</a></li>
      <li><a href="<?= base_url()?>index.php/admin/numServeisConsumit">Numero de serveis consumit</a></li>
    </ul>
  </li>
</ul>