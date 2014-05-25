<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
    <link href='<?= base_url()?>media/css/login.css' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script>
	$(function() {
		$("#datepicker1").datepicker({ appendText: "" });
		$("#datepicker2").datepicker({ appendText: "" });
	});
	/*RESPONSIVE */
	$(function() {  
		var pull        = $('#pull');  
			menu        = $('#cssmenu ul');  
			menuHeight  = menu.height();  
	  
		$(pull).on('click', function(e) {  
			e.preventDefault();  
			menu.slideToggle();  
		});  
	});
	$(window).resize(function(){  
		var w = $(window).width();  
		if(w > 320 && menu.is(':hidden')) {  
			menu.removeAttr('style');  
		}  
	});
	/*RESPONSIVE*/
	</script>
    <title>Time Bank</title>
  </head>
 <body>
 <div id='cssmenu'>
	<ul>
		<li class='active'><a href='<?= base_url()?>'><span>Inici</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/cercarusuari'><span>Buscar usuaris</span></a></li>
		<li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>Registre</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/contacte/'><span>Contacte</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/introduccio'><span>Què és un banc del temps?</span></a></li>
    
    <?=$this->load->view($login_form)?>
  </ul>
	<a href="#" id="pull"></a> 
 </div>
<?php echo $contingut; ?>

<div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto, Alex Martin.<a href='<?= base_url()?>index.php/politica_privacidad/'>Política privacitat</a> <a href='<?= base_url()?>index.php/inicio/aboutus/'><span>Sobre GODCODE.</span></a></p>
      </div>
    </div>
</body>
</html>