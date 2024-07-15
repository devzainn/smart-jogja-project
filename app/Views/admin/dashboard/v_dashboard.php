<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
    </div>
    <a href="<?= base_url('/generate-report') ?>" class="btn-download" id="generate-report-btn">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Generate Report</span>
    </a>

</div>

<ul class="box-info">
    <a href="<?= base_url('/list-survey') ?>">
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3><?= $totalRespondents ?></h3>
                <p>Total Respondents</p>
            </span>
        </li>
    </a>
</ul>

<ul class="box-info">
    <a href="<?= base_url('/responses/memuaskan') ?>">
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3><?= $satisfactoryResponses ?></h3>
                <p>Satisfactory Responses</p>
            </span>
        </li>
    </a>

    <a href="<?= base_url('/responses/cukup-memuaskan') ?>">
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3><?= $moderatelySatisfactoryResponses ?></h3>
                <p>Moderately Satisfactory Responses</p>
            </span>
        </li>
    </a>

    <a href="<?= base_url('/responses/belum-memuaskan') ?>">
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3><?= $unsatisfactoryResponses ?></h3>
                <p>Unsatisfactory Responses</p>
            </span>
        </li>
    </a>
</ul>

<script>
    document.getElementById('generate-report-btn').addEventListener('click', function(event) {
        event.preventDefault();
        var confirmation = confirm("Anda Akan Melakukan Generate Laporan Pengisian Survey Trans Jogja Per Tanggal (<?= date('Y-m-d') ?>)");
        if (confirmation) {
            window.location.href = this.href;
        }
    });
</script>

<?= $this->endSection() ?>