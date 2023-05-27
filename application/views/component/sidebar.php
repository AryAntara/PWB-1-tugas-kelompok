<div class="d-flex position-static">
  <div class="">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 300px; height: 100vh">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Sidebar</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="<?= base_url() . "admin/dashboard" ?>" class="nav-link text-white">
            <i class="bi bi-speedometer2 me-2"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="<?= base_url() . "admin/order" ?>" class=" nav-link text-white">
            <i class="bi bi-cart3 me-2"></i>
            Orders
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <i class="bi bi-file-plus me-2"></i>
            Products
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <i class="bi bi-people me-2"></i> Admins
          </a>
        </li>
      </ul>
    </div>
  </div>
