    <div class="w-100 px-5 mb-5">
      <div class="d-flex flex-wrap justify-content-center bg-light" style="width: 100%;">
        <div class="bg-light py-2 p-2 mt-5" style="width: 16rem;">
          <div class="d-flex justify-content-center">
            <div>
              <div class="p-2 px-2 text-light bg-primary rounded">
                <i class="bi bi-box-fill fs-2"></i>
              </div>
            </div>
            <div class="d-flex flex-column justify-content-between">
              <p class="text-left px-2 mb-0 fs-6 text-secondary">Products</p>
              <div class="px-2 rounded align-middle text-dark text-left align-middle" style="width: auto; height: 100px;">
                <h1 style="font-size: 40px"><?= $product_count ?></h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-light py-2 p-2 mt-5" style="width: 16rem;">
          <div class="d-flex justify-content-center">
            <div>
              <div class="p-2 px-2 text-light bg-primary rounded">
                <i class="bi bi-bag-fill fs-2"></i>
              </div>
            </div>
            <div class="d-flex flex-column justify-content-between">
              <p class="text-left px-2 mb-0 fs-6 text-secondary">Orders</p>
              <div class="px-2 rounded align-middle text-dark text-left align-middle" style="width: auto; height: 100px;">
                <h1 style="font-size: 40px"><?= $order_count['count'] ?></h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-light py-2 p-2 mt-5" style="width: 16rem;">
          <div class="d-flex justify-content-center">
            <div>
              <div class="p-2 px-2 text-light bg-primary rounded">
                <i class="bi bi-person-fill fs-2"></i>
              </div>
            </div>
            <div class="d-flex flex-column justify-content-between">
              <p class="text-left px-2 mb-0 fs-6 text-secondary">Admin</p>
              <div class="px-2 rounded align-middle text-dark text-left align-middle" style="width: auto; height: 100px;">
                <h1 style="font-size: 40px"> <?= $admin_count ?> </h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-2 mt-5 d-flex rounded flex-wrap justify-content-start" style="width: 100%;">
        <div class="justify-content-between py-2 mt-2 d-flex" style="width: 100%;background-color:transparent">
          <div class="d-flex" style="width:auto">
            <button class="bg-primary text-light me-2 px-2 btn fw-bold rounded" style="cursor:default; outline: none;">
              <i class="bi bi-bar-chart-line-fill"></i> Graphic Penjualan
            </button>
            <a href="<?= base_url() . 'admin/order' ?>" class="bg-primary text-light me-2 px-2 btn fw-bold rounded">
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
          <!-- <div class="d-flex bg-primary p-1 rounded">
        <input type="text" class="me-2 form-control">
        <button class="btn btn-outline-light"><i class="bi bi-search"></i></button>
      </div> -->
        </div>
      </div>
      <div class="d-inline-block bg-light w-100" style="height: 300px; position: relative">
        <canvas class="graph" data-order="<?= json_encode($order_count['per_month']) ?>"></canvas>
      </div>
    </div>
    </div>
    <!-- Right Content Closed  -->