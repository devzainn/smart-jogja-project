<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/about/update') ?>" method="post" class="form">
    <?= csrf_field() ?>
    <div class="input-box">
        <label for="detail_about">Detail About</label>
        <textarea name="detail_about" id="detail_about" rows="10" required><?= esc($detail_about) ?></textarea>
    </div>
    <button type="submit">Save</button>
</form>

<?= $this->endSection() ?>
