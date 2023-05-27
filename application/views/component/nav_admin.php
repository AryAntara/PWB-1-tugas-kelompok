<!-- Right Content Containner Open -->
<div class="w-100" style="overflow-y: scroll;height: 100vh">
  <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 mb-5">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
        <div class="d-flex text-secodary">
          Dashboard TEAMP4T Shopping
        </div>
        <div class="dropdown">
          <a href="#" class="ms-4 d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="bi bi-person-circle fs-10 me-2 ms-2" src="<?= base_url() . '/assets/img/man.png' ?>" width="48px" height="48px" style="object-fit:cover">
            <span class="mx-1 text-dark align-middle"><?= ucfirst($this->session->userdata('username')) ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser1">
            <!-- <li><a class="dropdown-item" href="#"><?= $email ?></a></li> -->
            <!-- <li><a class="dropdown-item" href="#"><?= $phone ?></a></li>                     -->
            <!-- <li> -->
            <!--     <hr class="dropdown-divider"> -->
            <!-- </li> -->
            <li><a class="dropdown-item" href="<?= base_url() . "admin/auth/logout" ?>"><i class="bi bi-box-arrow-left"></i> &nbsp; Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
