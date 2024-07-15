<?= $this->extend('nonadmin/v_layout') ?>

<?= $this->section('content') ?>

<form action="<?= base_url('survey/submitResponse') ?>" method="post">
    <?= csrf_field() ?>

    <div class="input-box">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>
    </div>
    <div class="input-box">
        <label>NIK</label>
        <input type="text" name="nik" placeholder="Enter your NIK" required>
    </div>
    <div class="input-box">
        <label>Address</label>
        <input type="text" name="address" placeholder="Enter your address" required>
    </div>
    <div class="input-box">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-box">
        <label>Phone</label>
        <input type="text" name="phone" placeholder="Enter your phone number" required>
    </div>

    <?php foreach ($criteria as $criterion) : ?>
        <div class="criteria-box">
            <label><?= $criterion['name'] ?></label>
            <?php if (isset($groupedSubCriteria[$criterion['id']])) : ?>
                <?php foreach ($groupedSubCriteria[$criterion['id']] as $sub) : ?>
                    <div>
                        <input type="radio" name="sub_criteria[<?= $criterion['id'] ?>]" value="<?= $sub['id'] ?>" required>
                        <label><?= $sub['name'] ?></label>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <button type="submit">Submit</button>
</form>

<?= $this->endSection() ?>