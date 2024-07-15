<?= $this->extend('admin/v_layout') ?>

<?= $this->section('content') ?>

<div class="head-title">
	<a href="<?= base_url('/form-sub-criteria'); ?>" class="btn-download">
		<i class='bx bxs-cloud-download'></i>
		<span class="text">Add Sub Criteria</span>
	</a>
</div>
<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Master Data Sub Criterias</h3>

            <select id="criteriaFilter" onchange="filterSubCriteria()">
                <option value="All">All</option>
                <?php foreach ($groupedSubCriteria as $criteriaName => $subcriteria): ?>
                    <option value="<?= $criteriaName ?>"><?= $criteriaName ?></option>
                <?php endforeach; ?>
            </select>
            
			<i class='bx bx-search'></i>
			<i class='bx bx-filter'></i>
		</div>
		<table>
			<thead>
				<tr>
					<th>Name</th>
                    <th>Criteria Name</th>
					<th>Utility Score</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($groupedSubCriteria as $criteriaName => $subcriteria): ?>
					<?php foreach ($subcriteria as $sub_criteria): ?>
                        <tr class="criteria-row" data-criteria="<?= $sub_criteria['criteria_name'] ?>">
                            <td><?= $sub_criteria['name'] ?></td>
                            <td><?= $sub_criteria['criteria_name'] ?></td>
                            <td><?= $sub_criteria['utility_score'] ?></td>
                            <td>
								<a href="<?= base_url('sub-criteria/edit/'.$sub_criteria['id']) ?>"><button class="edit">Edit</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?= $this->endSection() ?>