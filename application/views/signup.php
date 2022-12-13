<div class="container" style="min-height: 100vh;">
  <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;width: auto;">
    <div class="d-grid text-center justify-content-center"> 
      <h1 class="mb-4">Daftar</h1>
      <form class="create-user">
        <?php 
        # gunakan for each untuk membuat field input  
        $input_fields = [ 
          "email" => ["type" => "email","placeholder" => "Email"],
          "username" => ["type" => "text","placeholder" => "Nama Pengguna"],
          "phone" => ["type" => "text","placeholder" => "Nomor Telepon"],
          "password" => ["type" => "password","placeholder" => "Kata Sandi"],
          "confirm_password" => ["type" => "password","placeholder" => "Konfimasi Kata Sandi"]
        ];
        foreach ($input_fields as $key => $input_element) {
          $password = $key == 'password' || $key == 'confirm_password';
          $eye = !$password ? '' : '<span class="material-symbols-outlined btn eye">visibility_off</span>';
          echo '<div class="form-group mb-3 rounded-pill" style="40px">'.
          '<div class="d-flex border rounded-pill border-secondary" style="background-color: white;"><input name="'.$key.'" type="'.$input_element['type'].'" class="form-control rounded-pill text-left shadow-none border-0 m-0" placeholder="'.$input_element['placeholder'].'">'.$eye.'</div>'.
          '</div>';
        }    
        ?>
        <div class="d-grid">
          <a class="signin-link text-secondary mb-2" href="<?php echo base_url()?>user/login">Sudah punya akun? <span>Masuk</span></a>
          <button class="btn btn-secondary rounded-pill mt-2 mx-auto py-12" style="width: 80px;">Daftar</button>
        </div>
      </form>
    </div>
  </div>
</div>
