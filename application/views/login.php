<div class="container" style="min-height: 100vh;">
  <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;width: auto;">
    <div class="d-grid text-center justify-content-center"> 
      <h1 class="mb-4">Masuk</h1>
      <form class="login-user">
        <?php 
        # gunakan for each untuk membuat field input  
        $input_fields = [
          "username" => ["type" => "text", "placeholder"=>"Nama Pengguna" ] ,
          "password" => ["type" => "password", "placeholder" => "Kata Sandi"]
        ];
        foreach ($input_fields as $key => $input_element) {
         $password = $key == 'password';
          $eye = !$password ? '' : '<span class="material-symbols-outlined btn eye">visibility_off</span>';
          echo '<div class="form-group mb-3 rounded-pill">'.
          '<div class="d-flex border rounded-pill" style="background-color: white;"><input name="'.$key.'" type="'.$input_element['type'].'" class="form-control rounded-pill text-left shadow-none border-0 m-0" placeholder="'.$input_element['placeholder'].'">'.$eye.'</div>'.
          '</div>';
        }    
        ?>
        <div class="d-grid">
          <a class="d-none forgot-password-link text-secondary mb-2" href="<?php echo base_url()?>user/forgot_pass">Lupa password?</a>
          <button type="submit" class="btn btn-secondary rounded-pill mx-auto py-12 mt-2" style="width: 80px;">Masuk</button>
          <a class="register-link text-secondary mt-5" href="<?php echo base_url()?>user/signup">Belum punya akun? <span>Daftar</span></a>
        </div>
      </form>
    </div>
  </div>
</div>
