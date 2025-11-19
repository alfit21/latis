<div class="container mt-4">
	<h3>Data Admin</h3>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
	<?php endif; ?>

	<a href="<?= base_url('admin/create') ?>" class="btn btn-primary mb-3">Tambah Admin</a>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($admins as $a): ?>
				<tr>
					<td><?= $a->id ?></td>
					<td><?= $a->username ?></td>
					<td><?= $a->nama ?></td>
					<td>
						<a href="<?= base_url('admin/edit/' . $a->id) ?>" class="btn btn-warning btn-sm">Edit</a>
						<a href="<?= base_url('admin/delete/' . $a->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
