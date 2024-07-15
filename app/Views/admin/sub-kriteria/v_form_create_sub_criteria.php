<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<form action="<?= base_url('sub-criteria/store') ?>" method="post" class="form">
    <?= csrf_field() ?>
    <div class="column">
        <div class="input-box">
            <label>Name</label>
            <!-- <input type="text" name="name" id="name" placeholder="Enter sub criteria name" required /> -->
            <select name="name" id="name" required>
                <option value="Sangat Memenuhi">Sangat Memenuhi</option>
                <option value="Cukup Memenuhi">Cukup Memenuhi</option>
                <option value="Tidak Memenuhi">Tidak Memenuhi</option>

                <option value="Sangat Puas">Sangat Puas</option>
                <option value="Puas">Puas</option>
                <option value="Kurang Puas">Kurang Puas</option>

                <option value="Sesuai">Sesuai</option>
                <option value="Tidak Sesuai">Tidak Sesuai</option>

                <option value="Baik">Baik</option>
                <option value="Cukup Baik">Cukup Baik</option>
                <option value="Tidak Baik">Tidak Baik</option>

                <option value="Terjangkau">Terjangkau</option>
                <option value="Tidak Terjangkau">Tidak Terjangkau</option>

                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak Ada</option>
            </select>
        </div>
        <div class="input-box">
            <label for="criteria">Criteria</label>
            <select name="criteria_id" id="criteria" required>
                <option value="">Select an Criteria</option>
                <?php foreach ($criterias as $criteria): ?>
                    <option value="<?= $criteria['id'] ?>"><?= $criteria['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-box">
            <label>Utility Score</label>
            <input type="number" name="utility_score" id="utility_score" placeholder="Enter Utility Score" required />
        </div>
    </div>    
    <button>Submit</button>
</form>

<?= $this->endSection() ?>