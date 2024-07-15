<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/05cc81fb5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('styles/loginregister.css') ?>">
    <title>Sign in & Sign up Form</title>
    <style>
        .input-field.error input {
            border-color: black;
        }
        .input-field.error .fas {
            color: black;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo base_url('/login'); ?>" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
            <div class="input-field <?= session()->getFlashdata('error') ? 'error' : '' ?>">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" id="username" name="username" />
            </div>
            <div class="input-field <?= session()->getFlashdata('error') ? 'error' : '' ?>">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" id="password" name="password" />
            </div>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          <form action="<?php echo base_url('/register'); ?>" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" id="username-signup" name="username" />
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" id="email-signup" name="email" />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" id="password-signup" name="password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>SMART JOGJA ADMIN ACCESS</h3>
            <p>
              Halo admin! Selamat datang kembali di situs Smart Jogja!
            </p>
          </div>
          <img src="" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="<?= base_url('app.js') ?>"></script>
  </body>
</html>
