<div style="height: 80px"></div>
<div class="container mb-4 bg-light p-0">
<?php $total = 0;?>
<table class="table table-stripped table-responsive" style="overflow-x: scroll">
  <tbody>
    <?php foreach($this->cart->contents() as $product ){ ?>
        <?php $total += $product['price'] * $product['qty']?>
        <tr>
            <td class="align-middle" style="width=16px"><input <?= $product['options']['is_selected'] ? 'checked' : '' ?> type="checkbox"></th>
            <td class="align-top" style="width: 18rem"><img src="<?= base_url().$product['options']['gambar_produk'] ?>" class="img-product-cart rounded border border-1"></td>
            <td colspan="2" class="align-top">
                <p class="mb-2 fs-3"><?= $product['name']?></p>
                <p class="p-0 text-danger"> Rp. <?= number_format($product['price'],0,',','.')?>,00</p>
                <button class="btn btn-light border border-dark btn-sm shadow-none qty-minus">-</button> 
                <input class="text-center shadow-none border-0 border-bottom border-dark" type="text" name="" value="<?= $product['qty'] ?>" id="" style="outline: none; width: 40px;">
                <button class="btn btn-light border border-dark btn-sm shadow-none qty-plus">+</button> 
            </td>
            <td class="align-middle">  
                <button class="btn btn-danger delete-cart" data-id="<?= $product['id']?>">Hapus</button>
            </td>
        </tr>
    <?php } ?>
    <tr class="bg-warning ">
        <td colspan="4" class="text-end align-middle">Total Rp. <?= number_format($total,0,',','.') ?></td>
        <td class="text-end align-middle">
            <input class="me-2" checked type="checkbox" name="" id=""> Semua 
        </td>
        <td><button class="btn btn-danger">Beli Sekarang</button></td>
    </tr>
  </tbody>
</table>
</div>

<div class="container mt-4 bg-light mb-4 ">
    <p class="w-100 fs-5 fw-bold pt-5 pb-4 text-center">Mungkin Kamu Juga Suka</p>
    <div class="d-flex justify-content-center flex-wrap pb-4">
        <?php foreach($products as $product):?>
            <div class="card m-2 border border-2 shadow-sm" style="width: 14rem;height: 22rem">
                <div class="product" data-id="<?= $product->id_produk ?>" style="width: 100%;height:12rem"> <img src="<?= base_url().$product->gambar_produk ?>" class="card-img-top" alt="..." > </div>
                    <div class="card-body bg-light">
                        <h5 class="card-title"><?= $product->nama_produk ?></h5>
                        <p class="card-text text-success">Rp. <?= number_format($product->harga,0,',','.') ?></p>
                        <div class="d-flex">  
                            <button class="add-cart btn btn-outline-primary btn-sm mx-1" data-id='<?= $product->id_produk?>'>
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