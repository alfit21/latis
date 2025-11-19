<div class="container mt-4">
	<h3>Edit Admin</h3>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
	<?php endif; ?>

	<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

	<?= form_open('admin/editSave/' . $admin->id) ?>
	<div class="mb-3">
		<label>Username</label>
		<input type="text" name="username" class="form-control" value="<?= $admin->username ?>" required>
	</div>

	<div class="mb-3">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?= $admin->nama ?>" required>
	</div>

	<div class="mb-3">
		<label>Password Baru (opsional)</label>
		<input type="password" name="password" class="form-control">
	</div>

	<button class="btn btn-primary">Update</button>
	<a href="<?= base_url('admin') ?>" class="btn btn-secondary">Kembali</a>
	<?= form_close() ?>
</div>
