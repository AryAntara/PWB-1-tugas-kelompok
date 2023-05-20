<div style="height: 80px"></div>
<div class="container mt-5 bg-light mb-4" style="min-height:110vh">
<p class="text-center h1 mb-5 pt-5 fw-bold">Tentang Kami</p>

<div class="mx-5 px-5 text-center"  >
<?=$content->konten?>
<p class="text-center h1 mb-5 pt-5 fw-bold">Team Kita</p>
<div class="d-flex flex-wrap justify-content-center ">
<?php
foreach($founder as $user){

?>

<div class="card m-4 mb-5" style="width: 14rem;">
  <img src="<?=base_url()."assets/img/$user->foto_profil"?>" class="card-img-top" alt="..." style="content-fit:cover;height:280px">
  <div class="card-body">
    <p class="card-text mb-0 fw-bold"><?=ucfirst($user->data_user->username) ?></p>
    <p class="card-text pt-0">(<?=ucfirst($user->jabatan) ?>)</p>
  </div>
</div>

<?php
}
?>
</div>
</div>
</div>