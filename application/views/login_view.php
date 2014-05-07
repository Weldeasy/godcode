<h1>Simple 2 2 Login with CodeIgniter-Anton willy</h1>
    <?php echo validation_errors()."hOLA"; ?>
    <?php 
      $attributes = array('class' => 'email', 'id' => 'form_login');
      echo form_open('verifylogin', $attributes); 
    ?>
      <label for="username">Username:</label>
      <input type="text" size="20" id="username" name="username"/>
      <br/>
      <label for="password">Password:</label>
      <input type="password" size="20" id="passowrd" name="password"/>
      <br/>
      <input type="submit" value="Login"/>
    </form>