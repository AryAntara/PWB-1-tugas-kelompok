<div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yuk Lengkapi Form Dibawah ini.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="last-dialog" data-single-product="1">
        <div class="modal-body">
            <div class="form-group mt-2">
                <label class="text-danger" for="">Alamat</label>
                <textarea placeholder="Ketikan Alamat kamu, contoh nya wotu, Luwu Timur, Sulawesi Selatan" class="form-control w-100" name="address" id="" cols="100" rows="10"></textarea>
            </div>

            <div class="form-group mt-2">
                <label class="text-danger" for="">No Whatsapp</label>
                <input placeholder="ketik nomor wa mulai dari 62 tanpa tanda + ataupun 0" class="form-control w-100" type="text" name="whatsapp" id="">
            </div>

            <div class="form-group mt-2">
                <label class="text-danger" for="">Nama Penerima</label>
                <input placeholder="Nama yang menerima paket" class="form-control w-100" type="text" name="name" id="">
            </div>
        </div>
        <div class="modal-footer mt-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Beli</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div style="height: 80px"></div>
<div class="d-grid gap-2 mb-2 bg-light containner mx-2 rounded" style="min-height: 100vh">

  <!-- Product Header -->
  <div class="d-flex flex-wrap" style="height: auto; width: 100%">

    <!-- Image Product -->
    <div class="d-flex justify-content-center align-items-center" style="height: auto;width: 300px"> 
        <img src="<?= base_url().$product->gambar_produk ?>" class="mt-4 img-product m-auto rounded shadow-lg border">
    </div>

    <!-- Product Title -->
    <div style="height: auto;width: 900px"> 
        <table class="table table-borderless mb-4 m-2" style="width: auto">
          <tr>
            <td class="fs-4"><div class="mb-2 mt-2"><?= $product->nama_produk?></div></td>
          </tr>
          <tr class="mt-2">
            <td class="d-none table-secondary rounded-pill d-flex justify-content-center"> 
              <div class="mx-4 border border-end">0 Bintang</div>
              <div class="mx-4">0 Ulasan</div>
              <div class="mx-4">0 Terjual</div>
            <td>
          </tr>
          <tr>
            <td> 
              <div class="mt-2"> 

                <!--  is favorit ? -->
                <?php if(in_array($product->id_produk,$likes_product)){?>
                  <svg class="text-danger mx-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                  </svg> 
                  Favorit Mu
                <?php } ?>
              <div></td>
          </tr>

          <!-- product price -->
          <tr>
            <td class="fs-3 fw-bold"><?= number_format($product->harga,0,',','.') ?> IDR</td>
          </tr>
          <tr>

            <!--  quantity -->
            <td>
              <button class="btn btn-light border border-dark btn-sm shadow-none qty-minus">-</button> 
              <input disabled class="text-center shadow-none border-0 border-bottom border-dark" id="value-multiple-add-cart" type="text" name="" value="1" id="" style="outline: none; width: 40px;">
              <button class="btn btn-light border border-dark btn-sm shadow-none qty-plus">+</button> 
            <td>
          </tr>
        </table>

        <!-- button buy and add to cart -->
        <div class="m-2 p-0"> 
          <button class="btn btn-danger buy-one-product"  data-bs-toggle="modal" data-bs-target="#checkout" data-id="<?= $product->id_produk ?>">Beli Sekarang</button>
          <button class="btn btn-outline-danger multiple-add-cart" data-id='<?= $product->id_produk ?>'>Masukan Keranjang</button>
        </div>
      </div>
    
  </div>

  <!-- varian -->
  <div class="d-none m-4" sytle="height: auto">
    <p class="fs-4 mx-2"> Varian </p>
    <div class="bg-light d-flex align-items-center justify-content-left" style="height: 20vh;width:auto"> 
    <div class="bg-light d-flex align-items-center justify-content-left" style="height: 20vh;width:auto"> 
      <?php for($i = 0; $i < 3; $i++){ ?>
        <img src="<?= base_url($product->gambar_produk)?>" class="img-varian rounded m-2 border border-primary">
      <?php } ?>
    </div>
  </div>
  
  <!--  Spesifikasi dan Deskripsi -->
  <div class="d-flex bg-abu-abu flex-sm-column pb-2 flex-xl-row flex-lg-row justify-content-md-center" style="width: 100%;">

    <div class="bg-light p-4 ms-0 mt-2 me-lg-2 mb-2" style="height: 100%;width: 25%"> 
      <p class="fs-4 mx-2"> Speksifikasi </p> 
      <div class="fs-6 mx-2 mb-4"> 
        <table class="table table-borderless">
          <tr>
            <td>Stok</td>
            <td>: &nbsp <?= $product->stok ?> PCS </td>
          </tr>
          <tr>
            <td>Berat</td>
            <td>: &nbsp <?= $product->berat_produk ?> Kg </td>
          </tr>
          <tr>
            <td>Merek</td>
            <td>: &nbsp <?= $product->merek ?> </td>
          </tr>
          <tr>
            <td>Bahan</td>
            <td>: &nbsp <?= $product->bahan ?></td>
          </tr>
          <tr>
            <td>Asal</td>
            <td>: &nbsp <?= $product->negara_asal ?></td>
          </tr>
          <tr>
            <td>Di kirim</td>
            <td>: &nbsp <?= $product->dikirim_dari?></td>
          </tr>
        </table> 
      </div>
    </div>

    <div class="bg-light p-4 mr-1 my-2" style="height: 100%;width: 75%"> 
      <p class="fs-4 mx-2"> Deskripsi </p> 
      <div class="fs-6 mx-2 mb-4"> 
        <?= str_replace('\n','<br/>',$product->deskripsi) ?>
      </div>
    </div>
  </div>
</div>
