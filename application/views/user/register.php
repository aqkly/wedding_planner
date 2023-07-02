<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?=base_url()?>assets/user_login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="shortcut icon" href="<?= base_url('assets/upload/image/'.$konfigurasi->icon) ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/user_login/css/style.css">

    <style type="text/css">
    	.msg {
		  width:100%;
		  border: 1px solid;
		  padding:10px;
		  margin: 20px;
		  color: grey;
		}
		.msg-error {
		  // rouge
		  border-color: #d32f2f;
		  background-color: #ef5350;
		  color: white;
		}
		.msg-alert {
		  //orange
		   border-color: #ef6c00;
		  background-color: #ff9800;
		  color: white;
		}

		.msg-info{
		  border-color: #0288d1;
		  background-color: #29b6f6;
		  color: white;
		}
		p{
			color: white;
		}
    </style>
</head>
<body>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">

					<?php 
					//Notifikasi
					if($this->session->flashdata('error')){
					  echo '<div class="msg msg-error z-depth-3 scale-transition">';
					  echo '<h4><p>Registrasi Gagal</p></h4>';
					  echo $this->session->flashdata('error');
					  echo '</div>';
					}
					?>

                    <form method="POST" action="<?=base_url('user/daftar')?>" id="signup-form" class="signup-form">
                        <h2 class="form-title">Buat Akun</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nama_lengkap" id="name" placeholder="Nama Lengkap" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Username" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"required/>
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="no_hp" id="no_hp" placeholder="No HP"required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="alamat" id="alamat" placeholder="Alamat :"required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="psw" id="password" placeholder="Password"required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="repsw" id="re_password" placeholder="konfirmasi password" required/>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="signup" id="submit" class="form-submit" value="Buat Akun"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah Punya Akun ? <a href="<?=base_url('user/login')?>" class="loginhere-link">Masuk Disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?=base_url()?>assets/user_login/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/user_login/js/main.js"></script>
</body>
</html>