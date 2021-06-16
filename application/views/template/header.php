<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge" /> -->
    <title><?php echo $pageTitle; ?> | Serendipity Bookstore</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="<?php echo base_url('assets/materialize/css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo base_url('assets/css/kcdev.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        body {
          display: flex;
          min-height: 100vh;
          flex-direction: column;
        }
  
        main {
          flex: 1 0 auto;
        }
        .login-box {
          margin-top: 5%;
        }

        .placeholder {
          width: 100%;
          min-height: 460px;
          background-color: #556E5B;
        }

        .parallax-window {
          min-height: 460px;
          background: transparent;
          position: relative;
        }

        .tm-header {
          position: absolute;
          bottom: 0;
          left: 0;
          width: 100%;
          color: white;
          z-index: 1000;
        }

        .tm-header-inner {
          padding: 40px 50px;
        }

        .tm-site-logo {
          display: inline-block;
          margin-right: 5px;
        }

        .tm-site-text-box {
          display: inline-block;
        }

        .tm-site-description {
          font-size: 1.1rem;
          font-weight: 400;
        }

        .tm-section-title {
          font-size: 2rem;
          font-weight: 400;
          margin-bottom: 30px;
        }

        .tm-section,
        .tm-container-inner,
        .tm-container-inner-2 {
          margin-left: auto;
          margin-right: auto;
        }

        .tm-description-box {
          margin-left: auto;
          margin-right: auto;
        }

        .text-center {
          text-align: center;
        }

        .tm-paging-links {
          text-align: center;
          margin-bottom: 40px;
        }

        .tm-gallery {
          margin-bottom: 80px;
        }

        .tm-gallery-item {
          max-width: 280px;
          margin-bottom: 30px;
        }

        .img-fluid {
          max-width: 100%;
          height: auto;
        }

        .tm-gallery-title {
          font-size: 1.5rem;
          font-weight: 400;
          color: #4a148c;
          margin-bottom: 15px;
        }

        .tm-gallery-resto {
          margin-bottom: 20px;
          font-size: 1.2rem;
          color: #e65100;
        }

        .tm-gallery-description {
          margin-bottom: 20px;
          font-size: 1.1rem;
          color: black;
        }

        .tm-gallery-price {
          font-size: 1.2rem;
          color: #1B5E20;
          margin-bottom: 60px;
        }

        del{
          color: black;
          font-size: 1rem;
        }

        body {  background-image: url('<?php echo base_url('img/bg1.png'); ?>'); } 
      </style>
  </head>
  <body>
  <header>
      
      <nav class="purple darken-1 navbar-fixed" role="navigation">
          <div class="nav-wrapper container">
              <a id="logo-container" href="<?php echo base_url('dashboard'); ?>" class="brand-logo center">
                <span>SERENDIPITY BOOKSTORE</span>
              </a>
              <a href="#" data-activates="sidenav" class="button-collapse"><i class="material-icons">menu</i></a>
          </div>
      </nav>

  </header>