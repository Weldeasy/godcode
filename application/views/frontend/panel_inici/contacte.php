<div id="contenido_principal">
 <form class="form-container">
<div class="form-title"><h2>Contacte</h2></div>
<div class="form-title">Nombre</div>
<input class="form-field" type="text" name="firstname" /><?= form_error("firstname"); ?><br />
<div class="form-title">Email</div>
<input class="form-field" type="text" name="email" /><?= form_error("email"); ?><br />
<div class="form-title">Telefono</div>
<input class="form-field" type="text" name="telefono" /><?= form_error("telefono"); ?><br />
<div class="form-title">Telefono</div>
<input class="form-field" type="text-area" name="telefono" /><?= form_error("telefono"); ?><br />
<textarea name="comment">Escriu el teu missatgea</textarea>

<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" />
</div>
</form>
</div>

<div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto.<a href='<?= base_url()?>index.php/politica_privacidad/'>Política privacitat</a> </p>
      </div>
    </div>
</body>
</html>