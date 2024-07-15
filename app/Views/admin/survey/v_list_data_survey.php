<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3><?= $title ?></h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Response Date</th>
                    <th>Survey Result</th>
                    <th>Quality</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responses as $response) : ?>
                    <tr class="criteria-row">
                        <td><?= $response['respondent_name'] ?></td>
                        <td><?= $response['response_date'] ?></td>
                        <td><?= $response['survey_result'] ?></td>
                        <td><?= $response['quality'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
