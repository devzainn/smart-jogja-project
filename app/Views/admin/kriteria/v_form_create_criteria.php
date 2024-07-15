<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<form action="<?= base_url('criteria/store') ?>" method="post" class="form">
    <?= csrf_field() ?>
    <div class="column">
        <div class="input-box">
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="Enter full name" required />
        </div>
        <div class="input-box">
            <label for="indicator">Indicator</label>
            <select name="indicator_id" id="indicator" required>
                <option value="">Select an Indicator</option>
                <?php foreach ($indicators as $indicator): ?>
                    <option value="<?= $indicator['id'] ?>"><?= $indicator['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-box">
            <label>Weight</label>
            <input type="number" name="weight" id="weight" placeholder="Enter weight" required />
        </div>
    </div>    
    <button>Submit</button>
</form>

<?= $this->endSection() ?>