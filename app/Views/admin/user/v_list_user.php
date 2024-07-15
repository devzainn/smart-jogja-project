<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<div class="head-title">
	<?php if ($username === 'admin123'): ?>
        <a href="<?= base_url('/form-user') ?>" class="btn-download">
			<i class='bx bxs-cloud-download'></i>
			<span class="text">Add User</span>
		</a>
    <?php endif; ?>
</div>
<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Master Data Users</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin as $data): ?>
                    <tr>
                        <td><?= esc($data['username']) ?></td>
                        <td><?= esc($data['email']) ?></td>
                        <td>
                            <button class="delete" onclick="confirmDelete('<?= base_url('user/delete/'.$data['id']) ?>')">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
