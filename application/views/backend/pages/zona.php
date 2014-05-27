<h1>Serveis per provincia</h1><?php 
  echo $this->gcharts->ColumnChart('Provincia')->outputInto('inventori_div');
  echo $this->gcharts->div(600,500);
?>