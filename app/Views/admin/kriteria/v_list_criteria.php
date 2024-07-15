<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<div class="head-title">
	<a href="<?= base_url('/form-criteria'); ?>" class="btn-download">
		<i class='bx bxs-cloud-download'></i>
		<span class="text">Add Criteria</span>
	</a>
</div>
<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Master Data Criterias</h3>
			<select id="indicatorFilter" onchange="filterCriteria()">
                <option value="All">All</option>
                <?php foreach ($groupedCriteria as $indicatorName => $criteria): ?>
                    <option value="<?= $indicatorName ?>"><?= $indicatorName ?></option>
                <?php endforeach; ?>
            </select>
			<i class='bx bx-search'></i>
			<i class='bx bx-filter'></i>
		</div>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Indicator</th>
					<th>Weight</th>
					<!-- <th>Normalized Weight</th> -->
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($groupedCriteria as $indicatorName => $criteria): ?>
                    <?php foreach ($criteria as $criterion): ?>
                        <tr class="criteria-row" data-indicator="<?= $criterion['indicator_name'] ?>">
                            <td><?= $criterion['name'] ?></td>
                            <td><?= $criterion['indicator_name'] ?></td>
                            <td><?= $criterion['weight'] ?></td>
                            <!-- <td><?= number_format($criterion['normalized_weight'], 2) ?></td> -->
                            <td>
                                <a href="<?= base_url('criteria/edit/'.$criterion['id']) ?>"><button class="edit">Edit</button></a>
                                <button class="delete" onclick="confirmDelete('<?= base_url('criteria/delete/'.$criterion['id']) ?>')">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?= $this->endSection() ?>