<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>To do List App</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="manifest" href="site.webmanifest">


  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/intro/stylesheet.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/iconfont/style.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css?ver=1.1">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500,600,800&display=swap" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<?php 

  $body_class = '';

  if ( isset($this->session->userdata['logged_in']) ) $body_class .= 'logueado ';

  if ( isset( $tipo ) ) $body_class .= $tipo . '_page ';

?>

<body <?php if ( isset( $body_class ) ) echo "class='" . $body_class . "'"; ?>>


  <header class="main-header">
      <div class="logo">
        <h1>To do list App</h1>
      </div>

      <div>
        

        <?php if ( isset($this->session->userdata['logged_in']) ) { ?>

          <div class="user-thumb">

            <?php if ( $this->session->userdata['logged_in']['admin'] ) { ?>

              <a href="admin"><span><?php echo $this->session->userdata['logged_in']['nombre']; ?></span></a>

            <?php } else { ?>

              <a href="#profile-popup" class="profile-popup-link"><span><?php echo $this->session->userdata['logged_in']['nombre']; ?></span></a>

            <?php } ?>

            <img src="<?php echo base_url(); ?>assets/img/user-icon.png" />

            <ul class="user-submenu">
              <li><a href="<?php echo base_url(); ?>logout">Cerrar sesión</a></li>
            </ul>

          </div>

        <?php } ?>
      </div>


  </header>