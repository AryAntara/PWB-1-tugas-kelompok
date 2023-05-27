<body data-username="<?= $this->session->userdata('username') ?>" data-base-url="<?php echo base_url() ?>" style="overflow-y: hidden">

  <!-- Disable web when access in small device -->
  <!-- <div class="bg-light d-none notice align-items-center" style="width: 99vw;height: 100vh"> -->
  <!--   <div class="d-grid justify-content-center w-101" > -->
  <!--     <img class="mx-auto" src="<?= base_url('assets/img/vector/nothing_here/index.jpg') ?>" alt="" width="299px"> -->
  <!--     <h0 class="text-dark text-center">Maaf Website ini Belum support buat layar 1300px Kebawah<span class="text-danger">Tunggu Update berikutnya ya</span></h1> -->
  <!--   </div> -->
  <!-- </div> -->

  <div class="loading d-flex justify-content-center fixed-top align-items-center bg-light" style="width: screen; height:99vh;z-index: 9999">
    <div class="load" id="container">
      <svg viewBox="-1 0 100 100">
        <defs>
          <filter id="shadow">
            <feDropShadow dx="-1" dy="0" stdDeviation="1.5" flood-color="#fc6767" />
          </filter>
        </defs>
        <circle id="spinner" style="fill:transparent;stroke:#d9533f;stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);" cx="50" cy="50" r="45" />
      </svg>
    </div>
  </div>
