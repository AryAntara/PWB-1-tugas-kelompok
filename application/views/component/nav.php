<nav class="nav-desktop navbar navbar-expand-lg navbar-light p-5">
  <div class="container-fluid">
    <a class="navbar-brand font-bold d-none" href="#"> 
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
      </svg>
    </a>
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
      </svg>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="">About</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Wanita</a></li>
            <li><a class="dropdown-item" href="#">Pria</a></li>
            <li><a class="dropdown-item" href="#">Anak</a></li>
           </ul>
        </li>
      </ul>

      <form class="navbar-search justify-content-center form-grup d-none" style="width: 100%">
        <div class='border-1 bg-secondary text-light rounded-pill px-2' style="width: auto"> 
          <span class="material-symbols-outlined text-light fs-3 p-0 btn">search</span>
          <input class="search d-inline-block bg-secondary text-light border-0 shadow-none form-control rounded-pill" type="text" placeholder="cari pakaian disini" aria-label="Search">
        </div>
      </form>
      <?php if(!$this->session->userdata('id')){?>
        <a class="border btn btn-outline-secondary rounded-pill p-2 mx-2" href="<?= base_url()?>user/login">Masuk</a>
        <a class="border btn btn-primary rounded-pill p-2 mx-2" href="<?= base_url()?>user/signup">Daftar</a>
      <?php } else { ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
              </svg> <span class="mr-2"><?= $this->session->userdata('username')?></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url() ?>user/logout">logout</a></li>
            </ul>
          </li>
        </ul>
      <?php } ?>
      <a href="<?= base_url('cart/detail')?>"><span class="material-symbols-outlined p-0 btn btn-lg fs-3 px-2">
        shopping_cart
      </span></a>
      <span class="material-symbols-outlined p-0 btn btn-lg fs-3 px-2">
        chat
      </span>

    </div>
  </div>
</nav>

<nav class="nav-android bg-light border-bottom position-fixed navbar navbar-expand-lg navbar-light p-2 " style="width: 100%;z-index: 999;padding:0 ;">
  <div class="container-fluid">
    <a class="navbar-brand font-bold d-none" href="#"> 
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
      </svg>
    </a>
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
      </svg>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">About</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Wanita</a></li>
            <li><a class="dropdown-item" href="#">Pria</a></li>
            <li><a class="dropdown-item" href="#">Anak</a></li>
           </ul>
        </li>
      </ul>

      <form class="d-none navbar-search d-flex justify-content-center form-grup" style="width: 100%">
        <div class='border-1 bg-secondary text-light rounded-pill px-2' style="width: auto"> 
          <span class="material-symbols-outlined text-light fs-3 p-0 btn">search</span>
          <input class="search d-inline-block bg-secondary text-light border-0 shadow-none form-control rounded-pill" type="text" placeholder="cari pakaian disini" aria-label="Search">
        </div>
      </form>
     <?php if(!$this->session->userdata('id')){?>
        <a class="border btn btn-outline-secondary rounded-pill p-2 mx-2" href="<?= base_url()?>user/login">Masuk</a>
        <a class="border btn btn-primary rounded-pill p-2 mx-2" href="<?= base_url()?>user/signup">Daftar</a>
      <?php } else { ?>
        <a class="d-flex text-dark mb-2" style="text-decoration: none">
          <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
          </svg> <span class="mr-2"><?= $this->session->userdata('username')?></span>
        </a>
      <?php } ?> 
      <div class="mt-5 d-flex justify-content-center"> 
       <span class="material-symbols-outlined p-0 fs-3 px-2">
          shopping_cart
        </span>
        <span class="material-symbols-outlined p-0 fs-3 px-2">
          chat
        </span>
      </div>
    </div>
  </div>
</nav>

