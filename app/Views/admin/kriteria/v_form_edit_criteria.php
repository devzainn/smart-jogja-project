<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<form action="<?= base_url('criteria/update/' . $criteria['id']) ?>" method="post" class="form">
    <?= csrf_field() ?>
    <div class="input-box">
        <label for="indicator">Indicator</label>
        <select name="indicator_id" id="indicator" required>
            <?php foreach ($indicators as $indicator) : ?>
                <option value="<?= $indicator['id'] ?>" <?= $indicator['id'] == $criteria['indicator_id'] ? 'selected' : '' ?>>
                    <?= $indicator['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-box">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $criteria['name'] ?>" required />
    </div>
    <div class="input-box">
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" value="<?= $criteria['weight'] ?>" required />
    </div>
    <div class="input-box">
        <label for="normalized_weight">Normalized Weight</label>
        <input type="number" name="normalized_weight" id="normalized_weight" value="<?= $criteria['normalized_weight'] ?>" readonly/>
    </div>
    <button type="submit">Save</button>
</form>

<?= $this->endSection() ?>