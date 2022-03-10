<?php
// if (isset($this->session->userdata['logged_in'])) {
//   header("location: " . base_url() . "transmision-en-vivo");
// }
?>
<?php $this->load->view('templates/header'); ?>


<!-- end of masterslider -->

<div id="app">

  <div class="botones-ingreso content-wrapper">

    <div class="nav-list">

      <a class="open-pop" href="#login-pop">

          <img src="<?php echo base_url(); ?>assets/img/llaves.png" />

          <div>

              <h2>Ingresar</h2>

          </div>

      </a>

      <a class="open-pop" href="#register-pop">

          <img src="<?php echo base_url(); ?>assets/img/diccionario.png" />

          <div>

              <h2>Registrarse</h2>

          </div>

      </a>

    </div>

  </div>

  <div id="login-pop" class="pop-wrapper">

    <div class="login-wrapper">

    <div>
        <h2>Iniciar Sesión<br />
            de usuario</h2>
        <form action="<?php echo base_url(); ?>loginprocess" method="post" accept-charset="utf-8">
            <div class="input-group">
              <i class="icon-user"></i>
              <input type="email" placeholder="Correo electrónico" name="email" required />
            </div>
            <div class="input-group">
              <i class="icon-lock"></i>
              <input type="password" placeholder="Contraseña" name="password" required />
            </div>
            
            <button type="submit">Entrar</button>
            <p class="recovery">Aún no estas registrado? <a class="open-pop" href="#register-pop">HAZ CLICK AQUÍ</a></p>

        </form>
      </div>

    </div>

  </div>

  <div id="register-pop" class="pop-wrapper">

    <div class="login-wrapper">

     <div>
        <h2>Registrarse</h2>
        <form action="<?php echo base_url(); ?>nuevo-usuario" class="register-form" method="post" accept-charset="utf-8">
          <div class="input-group">
            <input type="text" required class="form-control" v-model="usuario.nombre" name="nombre" placeholder="Nombre completo">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <p v-if="errors.nombre" class="error">Debes escribir tu nombre</p>
         
          <div class="input-group">
            <input type="email" required v-model="usuario.email" class="form-control" name="email" placeholder="Correo electrónico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>
          <p v-if="errors.email" class="error">Debes escribir un email válido</p>
          <div class="input-group">
            <input type="password" required v-model="usuario.password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p v-if="errors.password" class="error">Debes escribir una contraseña</p>
          <div class="input-group">
            <input type="password" required v-model="usuario.confirm_password" name="confirm_password" class="form-control" placeholder="Repetir contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p v-if="errors.confirm_password" class="error">Las contraseñas deben coincidir</p>
          <br />
          <div>
            <div>
              
            </div>
            <!-- /.col -->
            <div>
              <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>

    </div>

  </div>

</div>

<script>
    var phpSession = false;
</script>

<?php $this->load->view('templates/footer'); ?>
