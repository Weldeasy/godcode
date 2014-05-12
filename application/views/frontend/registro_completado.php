<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registro completado</title>
</head>
<body>
	<div id="container">
		<?php
			if (isset($mensaje)) {
				print_r($mensaje);
			} else {
				print "A ocurregut algun error, torna a provar-ho, si continua contacta amb <a href='mailto:gcbtv0@gmail.com'><b>gcbtv0@gmail.com</b></a>";
			}
		?>
		<a href="<?= base_url(); ?>">Sortir</a>
	</div>
</body>
</html>