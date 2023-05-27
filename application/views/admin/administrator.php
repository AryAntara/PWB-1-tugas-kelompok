<div class="w-100 px-5 mb-5">
<div class="mb-2 d-flex rounded flex-wrap justify-content-start" style="width: 100%;">
  <div class="justify-content-between py-2 mt-2 d-flex" style="width: 100%;background-color:transparent">
    <!-- <div class="d-flex" style="width:auto"> -->
    <button class="bg-primary text-light me-2 px-2 btn fw-bold rounded" style="cursor:default; outline: none;">
      <i class="bi bi-person-circle me-2"></i> List Admin 
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
        <?php if (count($founder) < 1) { ?>
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
                <th width="350px">Name</th>
                <th width="200px" align="center">Jabatan</th>                
                <th>Menu</th>
              </tr>
            </thead>
            <?php foreach($founder as $no => $item){ ?>
                <tbody> 
                    <td class="first">
                        <div class="text-secondary justify-content-center"> <?= $no+1 ?></div> 
                    </td>
                    <td><div><?= $item->user->username ?></div></td>                    
                    <td><div><?= $item->jabatan ?></div></td>                    
                    <td><div>                        
                        <button class="btn btn-primary">edit</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Nama Produk</label>
            <input type="text" class="form-control mt-1 w-100" name="nama_produk">
        </div>
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Deskripsi</label>
            <textarea type="text" class="form-control mt-1 w-100" name="deskripsi"></textarea>
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