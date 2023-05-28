<div class="w-100 px-5 mb-5">
<div class="mb-2 d-flex rounded flex-wrap justify-content-start" style="width: 100%;">
  <div class="justify-content-between py-2 mt-2 d-flex" style="width: 100%;background-color:transparent">
    <!-- <div class="d-flex" style="width:auto"> -->
    <button class="bg-primary text-light me-2 px-2 btn fw-bold rounded" style="cursor:default; outline: none;">
      <i class="bi bi-box-fill me-2"></i> List Product
    </button>    
    <button data-bs-toggle="modal" data-bs-target="#tambah-product" class="bg-primary text-light me-2 px-2 btn fw-bold rounded" style="cursor:default; outline: none;">
      <i class="bi bi-bag-plus-fill me-2"></i> Tambah Product
    </button>    
    <!-- </div> -->
    <!-- <div class="d-flex bg-primary p-1 rounded">
      <input type="text" class="me-2 form-control">
      <button class="btn btn-outline-light"><i class="bi bi-search"></i></button>
    </div> -->
  </div>
</div>

<div class="d-flex rounded flex-wrap justify-content-start bg-light" style="width: 100%;">
    <div class="bg-light py-2 p-2 mt-2" style="width: 100%;">
      <div class="px-4 mt-4">
        <?php if (count($products) < 1) { ?>
          <table class="table w-100 table-borderless">
            <tr>
              <td class="first" colspan="5">
                <div class="justify-content-center text-secondary">Tidak ada riwayat Pesanan Yang di temukan</div>
              </td>
            </tr>
          </table>
        <?php  } else { ?>
          <table class="table w-100 table-borderless">
            <thead>
              <tr>
                <th class="text-center">No. </th>
                <th width="200px">Name</th>
                <th width="100px" align="center">Gambar</th>
                <th>Stok</th>
                <th>harga</th>
                <th>Menu</th>
              </tr>
            </thead>
            <?php foreach ($products as $no => $product) { ?>
                <tbody> 
                    <td class="first">
                        <div class="text-secondary justify-content-center"> <?= $no+1 ?></div> 
                    </td>
                    <td><div><?= $product->nama_produk ?></div></td>
                    <td><div><img src="<?= base_url() . $product->gambar_produk ?>" width="75px" height="75px" style="object-fit: cover"></div></td>                    
                    <td><div><?= number_format($product->stok) ?></div></td>
                    <td><div>Rp. <?= number_format($product->harga) ?></div></td>
                    <td><div>
                        <button data-route="<?= base_url().'admin/product/delete?id_product='.$product->id_produk  ?>" class="btn btn-danger btn-hapus mx-1">Delete</i></a>
                        <button data-row='<?= json_encode($product) ?>' class="btn-edit-produk btn btn-primary mx-1">Edit</button>
                        <a href="<?= base_url()."product/detail?product_id=$product->id_produk"  ?>" target="_blank" class="btn btn-success mx-1 text-white">Detail</a>
                    </div></td>                    
                </tbody>
            <?php }?>
          </table>
          <?php } ?>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="tambah-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-send" enctype="multipart/form-data" action="<?= base_url() . "admin/product/insert" ?>" method="post"> 
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-bag-plus me-2"></i> Tambah Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Nama Produk</label>
            <input type="text" class="form-control mt-1 w-100" name="nama_produk">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Deskripsi</label>
            <textarea type="text" rows="10" class="form-control mt-1 w-100" name="deskripsi"></textarea>
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Harga</label>
            <input type="number" class="form-control mt-1 w-100" name="harga">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Stok</label>
            <input type="number" class="form-control mt-1 w-100" name="stok">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Gambar</label>
            <input type="file" class="form-control mt-1 w-100" name="gambar">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Tipe</label>
            <input type="text" class="form-control mt-1 w-100" name="tipe">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Merek</label>
            <input type="text" class="form-control mt-1 w-100" name="merk">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Kategori</label>
            <select class="form-control mt-1 w-100" name="id_kategori"> 
                <?php foreach ($kategori as $item) { ?>
                    <option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Jenis Kelamin</label>
            <select class="form-control mt-1 w-100" name="jenis_kelamin"> 
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
                <option value="3">Umum</option>
            </select>
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Bahan</label>
            <input type="text" class="form-control mt-1 w-100" name="bahan">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Negara asal</label>
            <input type="text" class="form-control mt-1 w-100" name="negara_asal">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Dikirim dari</label>
            <input type="text" class="form-control mt-1 w-100" name="dikirim_dari">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Berat produk</label>
            <input type="text" class="form-control mt-1 w-100" name="berat_produk">
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-send" enctype="multipart/form-data" action="<?= base_url() . "admin/product/update" ?>" method="post"> 
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-pencil me-2"></i> Edit Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" name="id_produk">
      <div class="modal-body">
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Nama Produk</label>
            <input type="text" class="form-control mt-1 w-100" name="nama_produk">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Deskripsi</label>
            <textarea type="text" rows="10" class="form-control mt-1 w-100" name="deskripsi"></textarea>
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Harga</label>
            <input type="number" class="form-control mt-1 w-100" name="harga">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Stok</label>
            <input type="number" class="form-control mt-1 w-100" name="stok">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Gambar</label>
            <input type="file" class="form-control mt-1 w-100" name="gambar">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Tipe</label>
            <input type="text" class="form-control mt-1 w-100" name="tipe">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Merek</label>
            <input type="text" class="form-control mt-1 w-100" name="merk">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Kategori</label>
            <select class="form-control mt-1 w-100" name="id_kategori"> 
                <?php foreach ($kategori as $item) { ?>
                    <option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Jenis Kelamin</label>
            <select class="form-control mt-1 w-100" name="jenis_kelamin"> 
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
                <option value="3">Umum</option>
            </select>
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Bahan</label>
            <input type="text" class="form-control mt-1 w-100" name="bahan">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Negara asal</label>
            <input type="text" class="form-control mt-1 w-100" name="negara_asal">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Dikirim dari</label>
            <input type="text" class="form-control mt-1 w-100" name="dikirim_dari">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Berat produk</label>
            <input type="text" class="form-control mt-1 w-100" name="berat_produk">
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</div>

<!--  -->

</div>
