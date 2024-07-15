<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<form action="<?php echo base_url('/post-user'); ?>" method="post" class="form">
    <?= csrf_field() ?>
    <div class="column">
        <div class="input-box">
            <label>Username</label>
            <input type="text" name="username" id="username" placeholder="Enter Username" required />
        </div>
        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email" required />
        </div>
        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required />
        </div>
    </div>    
    <button>Submit</button>
</form>

<?= $this->endSection() ?>