<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Temp4t shopping</title>
  <!-- ICON -->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>favicon.ico">
  <!-- CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/js/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!-- CSS -->
  <!-- JS -->
  <script src="<?= base_url()?>assets/js/global.js"></script>
</head>

<body data-username="<?= $this->session->userdata('username') ?>" data-base-url="<?php echo base_url()?>">

<!-- Disable web when access in small device -->
<div class="bg-light d-none notice align-items-center" style="width: 100vw;height: 100vh">
  <div class="d-grid justify-content-center w-100" >
    <img class="mx-auto" src="<?= base_url('assets/img/vector/nothing_here/index.jpg') ?>" alt="" width="300px">
    <h1 class="text-dark text-center">Maaf Website ini Belum support buat layar 1300px Kebawah<span class="text-danger">Tunggu Update berikutnya ya</span></h1>
  </div>
</div>

<div class="loading d-flex justify-content-center fixed-top align-items-center bg-light" style="width: screen; height:100vh;z-index: 9999">
  <div class="load" id="container">
    <svg viewBox="0 0 100 100">
      <defs>
        <filter id="shadow">
          <feDropShadow dx="0" dy="0" stdDeviation="1.5" 
            flood-color="#fc6767"/>
        </filter>
      </defs>
      <circle id="spinner" style="fill:transparent;stroke:#d9534f;stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);" cx="50" cy="50" r="45"/>
    </svg>
  </div>
</div>

