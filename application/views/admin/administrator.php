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
                <th width="150px">Name</th>
                <th width="200px">Foto Profile</th>
                <th width="300px" align="center">Jabatan</th>                
                <th>Menu</th>
              </tr>
            </thead>
            <?php foreach ($founder as $no => $item) { ?>
                <tbody> 
                    <tr> 
                        <td class="first">
                            <div class="d-flex text-secondary justify-content-center"> <?= $no+1 ?></div> 
                        </td>
                        <td><div><?= $item->user->username ?></div></td>                    
                        <td><div><img src="<?= base_url().'assets/img/'.$item->foto_profil ?>" width="100px" height="100px" style="object-fit: cover;"></div></td>                    
                        <td><div><?= $item->jabatan ?></div></td>                    
                        <td><div>                        
                            <button data-row='<?= json_encode($item) ?>' class="btn-edit-admin btn btn-primary">edit</button>
                        </div></td>
                    </tr>
                </tbody>
            <?php }?>
          </table>
          <?php } ?>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="edit-admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-send" enctype="multipart/form-data" action="<?= base_url() . "admin/administrator/update" ?>" method="post"> 
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-profile me-2"></i> Edit Admin</h1> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" name="id">
      <div class="modal-body">
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Nama Jabatann</label>
            <input type="text" readonly class="form-control mt-1 w-100" name="jabatan">
        </div>                
        <div class="form-group mt-2 w-100 me-0">
            <label for="">Foto Profile</label>
            <input type="file" class="form-control mt-1 w-100" name="gambar">
        </div>        
        <div class="form-group mt-2 w-100 me-0">
            <label for="">user</label>
            <select class="form-control mt-1 w-100" name="id_user"> 
              <?php foreach ($users as $user) { ?>
                    <option value="<?= $user->id ?>"><?= $user->username ?></option>
                <?php } ?>
            </select>
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
