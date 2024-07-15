<?= $this->extend('nonadmin/v_layout') ?>

<?= $this->section('content') ?>

<div class="img"></div>
<div class="center">
    <div class="title">Website Smart Jogja</div>
    <div class="btns">
        <a href="<?= base_url('/form-survey'); ?>">
            <button>Take A Survey</button>
        </a>
        <a href="<?= base_url('/about'); ?>">
            <button>About Us</button>
        </a>        
    </div>
</div>

<?= $this->endSection() ?>