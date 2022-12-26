<div class="d-flex align-items-center justify-content-center" style="min-height: 60vh;width: auto;">
  <div class="rounded-3 bg-light text-dark" style="height: 300px; width: 500px; opacity: 0.8">
    <div class="d-flex justify-content-center flex-column text-center" style="height: 100%; width: 100%;">
      <h1 class="text-dark" style="opacity: 1">TEAMP4T Shopping</h1>
      <p>temukan pakain terbaik kalian.</p>
    </div>
  </div>
</div>

<form class="mb-5 search-home d-flex justify-content-center form-grup" style="width: 100%">
  <div class='mb-5 border-1 bg-secondary text-light rounded-pill px-2' style="width: auto"> 
    <span class="material-symbols-outlined text-light fs-3 p-0 btn">search</span>
    <input class="search d-inline-block bg-secondary text-light border-0 shadow-none form-control rounded-pill" type="text" placeholder="cari pakaian disini" aria-label="Search">
  </div>
</form>

<div id="carouselExampleCaptions" class="carousel slide position-fixed top-0" data-bs-ride="carousel" style="z-index: -1;width: 100%; height: 100%">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url() ?>assets/img/topi.png" class="d-block" alt="..." style="height: 100%;witdh: auto;">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url() ?>assets/img/jeans.png" class="d-block" alt="..." style="height: 100%; witdh: auto;margin: auto">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
</div>


<div class="home-android pb-5 bg-abu-abu border-top" style="min-height: 100vh; width: 100%;height: auto">
  <div class="mx-auto py-3 bg-light mt-5 px-4 mb-5" style="width:95vw"> 
  <div class="d-flex justify-content-between">
    
    <h1 class="mx-2">Rekomendasi</h1>
    <button class="btn mx-2 py-auto shadow-none" href="#">Lihat Semua ></button>
  </div>
  <div class="d-flex flex-wrap bg-light mt-2 justify-content-center" style="width:100%;min-height: 0; min-width: 0">

  <?php foreach($product_rekomendasi as $product ):?>
    <div class="card m-2 border border-2 shadow-sm" style="width: 14rem;height: 22rem">
      <div class="product" data-id="<?= $product->id_produk ?>" style="width: 100%;height:12rem"> <img src="<?= base_url().$product->gambar_produk ?>" class="card-img-top" alt="..." > </div>
      <div class="card-body bg-light">
        <h5 class="card-title"><?= $product->nama_produk ?></h5>
        <p class="card-text text-success">Rp. <?= number_format($product->harga,0,',','.') ?></p>
        <div class="d-flex">  

        <button href="#" class="btn btn-outline-primary btn-sm mx-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
          </svg>
        </button>

       
        <?php if(in_array($product->id_produk,$likes_product)){?>
          
          <button href="#" data-id="<?= $product->id_produk?>" class="btn-product-id-<?= $product->id_produk?> btn button-fav btn-danger btn-sm mx-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
              <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg>
          </button>

        <?php } else { ?> 

          <button href="#" data-id="<?= $product->id_produk?>" class="btn-product-id-<?= $product->id_produk?> btn button-fav btn-outline-danger btn-sm mx-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
              <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg>
          </button>

        <?php } ?>
        </div>
      </div>
    </div>
  <?php endforeach;?> 
  </div>
  </div>

  <div class="mx-auto py-3 d-grid bg-light mt-5 px-4" style="width:95vw"> 
  <div class="d-flex justify-content-between">
    
    <h1 class="mx-2">Popular</h1>
    <button class="btn mx-2 py-auto shadow-none" href="#">Lihat Semua ></button>  
</div>
  <div class="d-flex flex-wrap bg-light mt-2 justify-content-center" style="width:auto">
  <?php foreach($product_rekomendasi as $product):?>
    <div class="card m-2 border border-2 shadow-sm" style="width: 14rem;height: 22rem">
     <div class="product" data-id="<?= $product->id_produk ?>" style="width: 100%;height:12rem"> <img src="<?= base_url().$product->gambar_produk ?>" class="card-img-top" alt="..." > </div>
     <div class="card-body bg-light">
        <h5 class="card-title"><?= $product->nama_produk ?></h5>
        <p class="card-text text-success">Rp. <?= number_format($product->harga,0,',','.') ?></p>
        <div class="d-flex">  
          
        <button href="#" class="btn btn-outline-primary btn-sm mx-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
          </svg>
        </button>

        <?php if(in_array($product->id_produk,$likes_product)){?>
          
          <button href="#" data-id="<?= $product->id_produk?>" class="btn-product-id-<?= $product->id_produk?> btn button-fav btn-danger btn-sm mx-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
              <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg>
          </button>

        <?php } else { ?> 

          <button href="#" data-id="<?= $product->id_produk?>" class="btn-product-id-<?= $product->id_produk?> btn button-fav btn-outline-danger btn-sm mx-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
              <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg>
          </button>

        <?php } ?>

        </div>
      </div>
    </div>
  <?php endforeach;?>
  </div>
  </div>

</div>
