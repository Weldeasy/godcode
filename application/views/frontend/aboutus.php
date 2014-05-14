<? include(BASE_URI . 'php/head.php');?>
 <body>
 <div id='cssmenu'>
   <ul>
	<li class='active'><a href='<?= base_url()?>'><span>INICI</span></a></li>
     <li class='active'><a href='#'><span>QUÉ ES UN BANCO DEL TIEMPO?</span></a></li>
     <li class='active'><a href='<?= base_url()?>index.php/aboutus/'><span>SOBRE GODCODE</span></a></li>
     <li class='active'><a href='#'><span>CONTACTA</span></a></li>
	 <?php
	if ($login_form != null) {
		echo $this->load->view($login_form);
		?><li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>REGISTRE'T</span></a></li><?php
	} else {
		echo $this->load->view('frontend/welcome');
	}
?>
  </ul>
 </div>
 <div id="contenido_principal">
  <div id="about_us">
              <h1>SOBRE NOSALTRES</h1>
              <hr />
              <br />
              <p>Godcode és una empresa impulsada per un jove grup de programadors web. Malgrat ser un grup tan jove, podem encarrilar qualsevol projecte gràcies a les nostres ganes i professionalitat. Tenim un gran ventall de projectes nostres, si vulgues més informació posi's en contacte amb nosaltres o miri en la nostra web.</p>
              <table id="table_programadors">
                <td>
                  <tr>
                    <p>Alex Martín Tapia</p>
                    <ul>
                      <li>Programador informátic</li>
                    </ul>
                  </tr>
                  <tr>
                    <p>Oscar Marcos</p>
                    <ul>
                      <li>Programador informátic</li>
					  <li>Elkete foka, elkete parte la voka</li>
                    </ul>
                  </tr>
                  <tr>
                    <p>Oriol Antón</p>
                    <ul>
                      <li>Programador informátic</li>
                    </ul>
                  </tr>
                  <tr>
                    <p>Willy</p>
                    <ul>
                      <li>Programador informátic</li>
                    </ul>
                  </tr>
                </td>
              </table>
            </div>
        </div>
      </center>
    </div>
    <div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Esto es el footer</p>
      </div>
    </div>
    
</div>