<div style="height: 80px"></div>
<div
<div class="bg-light containner mx-2 rounded" style="min-height: 100vh">
  <div class="d-flex flex-wrap" style="height: auto; width: 100%">
    <div class="d-flex justify-content-center align-items-center" style="height: auto;width: 300px"> 
        <img src="<?= base_url().$product->gambar_produk ?>" class="mt-4 img-product m-auto rounded shadow-lg border">
    </div>
    <div style="height: auto;width: 900px"> 
        <table class="table table-borderless mb-4 m-2" style="width: auto">
          <tr>
            <td class="fs-4"><div class="mb-2 mt-2"><?= $product->nama_produk?></div></td>
          </tr>
          <tr class="mt-2">
            <td class="table-secondary rounded-pill d-flex justify-content-center"> 
              <div class="mx-4 border border-end">0 Bintang</div>
              <div class="mx-4">0 Ulasan</div>
              <div class="mx-4">0 Terjual</div>
            <td>
          </tr>
          <tr>
            <td> 
              <div class="mt-2"> 
                <?php if(in_array($product->id_produk,$likes_product)){?>
                  <svg class="text-danger mx-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                  </svg> 
                  Favorit Mu
                <?php } ?>
              <div></td>
          </tr>
          <tr>
            <td class="fs-3 fw-bold"><?= number_format($product->harga,0,',','.') ?> IDR</td>
          </tr>
          <tr>
            <td>
              <button class="btn btn-light border border-dark btn-sm shadow-none">-</button> 
              <input class="text-center shadow-none border-0 border-bottom border-dark" type="text" name="" value="1" id="" style="outline: none; width: 40px;">
              <button class="btn btn-light border border-dark btn-sm shadow-none">+</button> 
            <td>
          </tr>
        </table>
        <div class="m-2 p-0"> 
          <button class="btn btn-danger">Beli Sekarang</button>
          <button class="btn btn-outline-danger ">Masukan Keranjang</button>
        </div>
      </div>
    </div>
  <div class="m-4" sytle="height: auto">
    <p class="fs-4 mx-2"> Varian </p>
    <div class="bg-light d-flex align-items-center justify-content-left" style="height: 20vh;width:100%"> 
      <?php for($i = 0; $i < 3; $i++){ ?>
        <img src="<?= base_url($product->gambar_produk)?>" class="img-varian rounded m-2 border border-primary">
      <?php } ?>
    </div>
  </div>
  
  <div class="bg-abu-abu desc-and-spec justify-content-between" style="width: 100%;">

    <div class="bg-light me-2 p-4 ms-0 my-2" style="height: 50vh;width: 40%"> 
      <p class="fs-4 mx-2"> Speksifikasi </p> 
      <div class="fs-6 mx-2 mb-4"> 
        <table class="table table-borderless">
          <tr>
            <td>Stok</td>
            <td>: &nbsp <?= $product->stok ?> PCS </td>
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

    <div class="bg-light ml-2 p-4 mr-1 my-2" style="height: 50vh;width: 60%"> 
      <p class="fs-4 mx-2"> Deskripsi </p> 
      <div class="fs-6 mx-2 mb-4"> 
        <?= $product->deskripsi ?>
      </div>
    </div>

  </div>

</div>