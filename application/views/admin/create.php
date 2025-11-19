<div class="container mt-4">
	<h3>Tambah Admin</h3>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
	<?php endif; ?>

	<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

	<?= form_open('admin/save') ?>
	<div class="mb-3">
		<label>Username</label>
		<input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" required>
	</div>

	<div class="mb-3">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" required>
	</div>

	<div class="mb-3">
		<label>Password</label>
		<input type="password" name="password" class="form-control" required>
	</div>

	<button class="btn btn-primary">Simpan</button>
	<a href="<?= base_url('admin') ?>" class="btn btn-secondary">Kembali</a>
	<?= form_close() ?>
</div>
