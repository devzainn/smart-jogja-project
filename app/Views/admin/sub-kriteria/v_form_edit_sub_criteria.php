<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<form action="<?= base_url('sub-criteria/update/' . $subcriteria['id']) ?>" method="post" class="form">
    <?= csrf_field() ?>
    <div class="input-box">
        <label for="criteria">Criteria</label>
        <select name="criteria_id" id="criteria" required>
            <?php foreach ($criterias as $criteria) : ?>
                <option value="<?= $criteria['id'] ?>" <?= $criteria['id'] == $subcriteria['criteria_id'] ? 'selected' : '' ?>>
                    <?= $criteria['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-box">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $subcriteria['name'] ?>" required />
    </div>
    <div class="input-box">
        <label for="utility_score">Utiliry Score</label>
        <input type="number" name="utility_score" id="utility_score" value="<?= $subcriteria['utility_score'] ?>" required />
    </div>
    <button type="submit">Save</button>
</form>

<?= $this->endSection() ?>