<h2>Serveis per provincia</h2>
<?php 
  echo $this->gcharts->ColumnChart('Provincia')->outputInto('inventori_div');
  echo $this->gcharts->div(600,500);  
?>
<div id="mitja">
<h2>Serveis per usuari: </h2>
<p><?php echo $mitja; ?></p>

</div>
<div id="mitja">

<h2>Serveis consumits: </h2>
<p><?php echo $consumits; ?></p>
</div>