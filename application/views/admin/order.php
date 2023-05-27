<div class="w-100 px-5 mb-5">
  <div class="d-flex flex-wrap justify-content-start bg-light" style="width: 100%;">
    <div class="bg-light py-2 p-2 mt-2" style="width: 100%;">
      <p class="text-left fs-5 ps-4"> <i class="bi fs-4 bi-cart"></i> List Pernjualan</p>
      <hr>
      <div class="px-4 mt-4">
        <table class="datatable table w-100">
          <thead>
            <tr>
              <th>No. </th>
              <th>Name</th>
              <th width="250px">Product</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>

          <?php
          foreach ($order as $i => $item) {
          ?>
            <tbody>
              <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $item->user->username ?></td>
                <td><?= $item->product->nama_produk ?></td>
                <td><?= $item->qty ?></td>
                <td>Rp. <?= number_format($item->price) ?></td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>


</div>
<!-- Right Content Closed  -->
<!--Right Content Closed-- > !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >        !--Right Content Closed-- >
