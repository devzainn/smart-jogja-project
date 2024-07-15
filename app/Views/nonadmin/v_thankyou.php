<?= $this->extend('nonadmin/v_layout') ?>

<?= $this->section('content') ?>

<div class="thankyou-container">
    <p class="thankyou-message">Terima kasih telah berpartisipasi dalam mengisi survey ini.</p>
    <a href="<?= base_url('/form-survey'); ?>" class="btn-finish">Selesai</a>
</div>

<?= $this->endSection() ?>