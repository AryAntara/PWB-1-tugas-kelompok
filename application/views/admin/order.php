<div class="w-100 px-5 mb-5">
  <div class="mb-2 d-flex rounded flex-wrap justify-content-start" style="width: 100%;">
    <div class="justify-content-between py-2 mt-2 d-flex" style="width: 100%;background-color:transparent">
      <!-- <div class="d-flex" style="width:auto"> -->
      <button class="bg-primary text-light me-2 px-2 btn fw-bold rounded" style="cursor:default; outline: none;">
        <i class="bi bi-bag-fill"></i> List Order
      </button>
      <button data-bs-toggle="modal" data-bs-target="#filter" class="btn btn-primary position-relative"><i class="fs-4 bi bi-filter-left"></i><?= $filter_badge ?></button>
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
        <?php if (count($order) < 1) { ?>
          <table class="table w-100 table-borderless">
            <tr>
              <td class="first" colspan="5">
                <div class="justify-content-center text-secondary">Tidak ada riwayat Pesanan Yang di temukan</div>
              </td>
            </tr>
          </table>
        <?php } else { ?>
          <table class="table w-100 table-borderless">
            <thead>
              <tr>
                <th class="text-center">No. </th>
                <th>Name</th>
                <th width="250px">Product</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>

            <?php
            $total_price = 0;
            $total_qty = 0;
            foreach ($order as $i => $item) {
              $total_price +=  $item->qty * $item->price;
              $total_qty += $item->qty;
            ?>
              <tbody>
                <tr>
                  <td class="first">
                    <div class="text-secondary justify-content-center"><?= $i + 1 ?></div>
                  </td>
                  <td>
                    <div><?= ucfirst($item->user->username) ?></div>
                  </td>
                  <td>
                    <div><?= strtolower($item->product->nama_produk) ?></div>
                  </td>
                  <td>
                    <div><?= $item->qty ?></div>
                  </td>
                  <td class="last">
                    <div>Rp. <?= number_format($item->qty * $item->price) ?></div>
                  </td>
                </tr>
              </tbody>
            <?php } ?>
            <tr>
              <td class="first" colspan="2">
                <div class="justify-content-center fw-bold">Total</div>
              </td>
              <td>
                <div class="justify-content-end">:</div>
              </td>
              <td>
                <div><?= $total_qty ?? '-' ?></div>
              </td>
              <td class="last">
                <div><?= $total_price ? "Rp. " . number_format($total_price) : '-' ?></div>
              </td>
            </tr>
          </table>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="filter">
  <form>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Filter Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <div class="form-group">
              <li><label class="fw-bold">Order Date </label></li>
              <div class="d-flex w-100">
                <input type="date" value="<?= isset($filter['start']) ? $filter['start'] : '' ?>" name="start" class="form-control my-2" style="width: 200px">
                <div class="d-flex px-2 justify-content-center align-items-center my-2"><i class="bi bi-arrow-right-square-fill fs-4 text-primary"></i></div>
                <input type="date" value="<?= isset($filter['end']) ? $filter['end'] : '' ?>" name="end" class="form-control my-2" style="width: 200px">
              </div>
            </div>
            <div class="form-group">
              <li><label class="fw-bold">Order From </label></li>
              <div class="form-group">
                <?php $column = isset($filter['column']) ? $filter['column'] : ''; ?>
                <div><input type="radio" <?= $column == 'product' ? 'checked' : '' ?> class="my-2" name="column" value="product"> <span class="ms-1">Product Name</span> </div>
                <div><input type="radio" <?= $column == 'price' ? 'checked' : '' ?> class="mt-2" name="column" value="price"> <span class="ms-1">Price</span> </div>
                <div><input type="radio" <?= $column == 'qty' ? 'checked' : '' ?> class="my-2" name="column" value="qty"> <span class="ms-1">Quantity</span> </div>
              </div>
            </div>
            <div class="form-group">
              <li><label class="fw-bold">Order By </label></li>
              <div class="form-group">
                <?php $arrage = isset($filter['arrage']) ? $filter['arrage'] : ''; ?>
                <div><input type="radio" <?= $arrage == 'up' ? 'checked' : '' ?> class="my-2" name="arrage" value="up"> <i class="bi text-success bi-arrow-up"></i></div>
                <div><input type="radio" <?= $arrage == 'down' ? 'checked' : '' ?> class="my-2" name="arrage" value="down"> <i class="bi text-warning bi-arrow-down"></i></div>
              </div>
            </div>
            <div class="form-group">
              <li><label class="fw-bold">From User </label></li>
              <div class="form-group">
                <select name="user" id="" class="form-control mt-2">
                  <option value=""> Filter From User </option>
                  <?php foreach ($users as $user) {  ?>
                    <option value="<?= $user->id  ?>" <?= isset($filter['user']) && $filter['user'] == $user->id ? "selected" : ""  ?>> <?= ucfirst($user->username) ?> </option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </div>
    </div>
  </form>
</div>

</div>
<!-- Right Content Closed  -->
<!--Right Content Closed-- > !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >