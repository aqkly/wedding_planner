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

		.msg-success {
		  // rouge
		  border-color: #d32f2f;
		  background-color: #0acf14;
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
    </style>
</head>
<body>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">

					<?php 
					//Notifikasi
					if($this->session->flashdata('gagal')){
					  echo '<div class="msg msg-error z-depth-3 scale-transition">';
					  echo $this->session->flashdata('gagal');
					  echo '</div>';
					}

					if($this->session->flashdata('sukses')){
					  echo '<div class="msg msg-success z-depth-3 scale-transition">';
					  echo $this->session->flashdata('sukses');
					  echo '</div>';
					}
					?>

                    <form method="POST" action="<?=base_url('user/masuk')?>" id="signup-form" class="signup-form">
                        <h2 class="form-title">SILAHKAN LOGIN</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="psw" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="login" id="submit" class="form-submit" value="MASUK"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Tidak Punya Akun ? <a href="<?=base_url('user/register')?>" class="loginhere-link">Buat Akun Disini</a>
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