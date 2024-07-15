<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<div class="guideline-container">
    <div class="guideline-card">
        <div class="card-header">
            <h3>Dashboard Menu</h3>
        </div>
        <div class="card-content">
            <p>Menu ini merupakan menu yang berisikan summary data survey yang telah dilakukan.</p>
            <br/>
            <p>Pada menu ini terdapat tombol <strong><i>Generate Report</i></strong> yang dapat digunakan untuk men-<i>generate</i> data yang ada pada dashboard kedalam bentuk excel file.</p>
        </div>
    </div>
    <div class="guideline-card">
        <div class="card-header">
            <h3>Survey Result Menu</h3>
        </div>
        <div class="card-content">
            <p>Menu ini merupakan menu yang menampilkan list data hasil pengisian survey oleh responden, pada list tersebut ditampilkan data nama responden, tanggal pengisian survey, skor hasil survey, dan hasil kualitas dari nilai skor hasil survey.</p>
        </div>
    </div>
    <div class="guideline-card">
        <div class="card-header">
            <h3>Master Data Kriteria Menu</h3>
        </div>
        <div class="card-content">
            <p>Menu ini merupakan menu yang dapat digunakan untuk membuat kebutuhan pembuatan data kriteria yang nilainya akan digunakan dalam perhitungan keputusan kualitas tans jogja melalui survey dan data kriteria ini akan digunakan untuk keperluan data sub-kriteria.</p>
            <br/>
            <p>Pada menu ini terdapat <strong>empat</strong> fungsionalitas utama yang dapat digunakan, yaitu:</p>
            <br/>
            <p><strong>1. Create Master Data Kriteria</strong></p>
            <p>Funsionalitas ini dapat digunakan dengan menekan tombol <strong>Add Criteria</strong> untuk membuat master data kriteria baru, dengan data yang harus dimasukkan ialah data <i>name, indicator, dan weight</i> dari kriteria tersebut.</p>
            <br/>
            <p><strong>2. Edit Master Data Kriteria</strong></p>
            <p>Fungsionalitas ini digunakan dengan menekan tombol <strong>Edit</strong> untuk mengedit data kriteria, dengan memilih data yang akan di edit, menginputkan data terbaru, dan menekan tombol <i>save</i> untuk menyimpan perubahan.</p>
            <br/>
            <p><strong>3. Delete Master Data Kriteria</strong></p>
            <p>Fungsionalitas ini digunakan dengan menekan tombol <strong>Delete</strong> untuk menghapus data kriteria yang ada.</p>
            <br/>
            <p><strong>4. Filter Data Kriteria</strong></p>
            <p>Fungsionalitas ini digunakan dengan memilih data indikator pada <i>text input</i> <strong><i>filtering</i></strong> yang diinginkan. Untuk saat ini, data kriteria dapat disaring berdasarkan indikator.</p>
        </div>
    </div>
    <div class="guideline-card">
        <div class="card-header">
            <h3>Master Data Sub Kriteria Menu</h3>
        </div>
        <div class="card-content">
            <p>Menu ini merupakan menu yang dapat digunakan untuk membuat kebutuhan pembuatan data sub-kriteria yang nilainya akan digunakan dalam perhitungan keputusan kualitas tans jogja melalui survey.</p>
            <br/>
            <p>Pada menu ini terdapat <strong>tiga</strong> fungsionalitas utama yang dapat digunakan, yaitu:</p>
            <br/>
            <p><strong>1. Create Master Data Sub Kriteria</strong></p>
            <p>Fungsionalitas ini dapat digunakan dengan menekan tombol <strong>Add Criteria</strong> untuk membuat master data sub-kriteria baru, dengan data yang harus dimasukkan ialah data <i>name, criteria, dan utility score</i> dari sub-kriteria tersebut.</p>
            <br/>
            <p><strong>2. Edit Master Data Kriteria</strong></p>
            <p>Fungsionalitas ini digunakan dengan menekan tombol <strong>Edit</strong> untuk mengedit data sub-kriteria, dengan memilih data yang akan di edit, menginputkan data terbaru, dan menekan tombol <i>save</i> untuk menyimpan perubahan.</p>
            <br/>
            <p><strong>3. Filter Data Kriteria</strong></p>
            <p>Fungsionalitas ini digunakan dengan memilih data kriteria pada <i>text input</i> <strong><i>filtering</i></strong> yang diinginkan. Untuk saat ini, data sub-kriteria dapat disaring berdasarkan kriteria.</p>
        </div>
    </div>
    <div class="guideline-card">
        <div class="card-header">
            <h3>User Menu</h3>
        </div>
        <div class="card-content">
            <p>Menu ini menampilkan list data user admin yang dapat mengakses halaman admin. Terdapat tombol <strong>Delete</strong> yang digunakan untuk menghapus data user yang ada.</p>
        </div>
    </div>
    <div class="guideline-card">
        <div class="card-header">
            <h3>Guidline Menu</h3>
        </div>
        <div class="card-content">
            <p>Menu ini digunakan untuk melihat penjelasan dan tata cara penggunaan fitur yang ada pada masing-masing menu.</p>
        </div>
    </div>
    <div class="guideline-card">
        <div class="card-header">
            <h3>Logout</h3>
        </div>
        <div class="card-content">
            <p>Menu yang digunakan untuk mengakhiri sesi atau keluar dari aplikasi.</p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
