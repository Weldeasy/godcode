<div class="infousuari">
<h1 class="label_title">Serveis dels usuaris</h1>
<?php foreach ($servei as $data) { ?>
  <div class="un_info_usuari">
    <p><b>Nom :</b><?php echo $data->nom_servei; ?></p>
    <p><b>Descripció :</b><?php echo $data->descripcio_servei; ?></p>
    <p><b>Categoria :</b><?php echo $data->nom_categoria; ?></p>
    <p><b>Data Inici :</b><?php echo $data->data_inici; ?></p>
    <p><b>Data Final :</b><?php echo $data->data_fi; ?></p>
    <p><b>Horari :</b><?php echo $data->disp_horaria; ?></p>
    <p><b>Preu :</b><?php echo $data->preu; ?></p>
  </div>
<?php } ?>
</div>
