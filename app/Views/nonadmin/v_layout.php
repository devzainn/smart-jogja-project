<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Jogja</title> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('styles/nonadmin.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">Smart Jogja</a>
      </div>
      <ul>
        <li><a href="<?= base_url('/home'); ?>">Home</a></li>
        <li><a href="<?= base_url('/about'); ?>">About</a></li>
        <li><a href="<?= base_url('/form-survey'); ?>">Survey</a></li>
        <li><a href="<?= base_url('/guidline'); ?>">Guidline</a></li>
        <li><a href="<?= base_url('/'); ?>">Login</a></li>
      </ul>
    </div>
  </nav>
  <main>
    <?= $this->renderSection('content') ?>
  </main>
</body>
</html>