<main class="app-main mt-5">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tambah Siswa</h3>
			</div>
			<div class="card-body">
				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success">
						<?= $this->session->flashdata('success') ?>
					</div>
				<?php endif; ?>

				<?php if (isset($error_upload)): ?>
					<div class="alert alert-danger"><?= $error_upload ?></div>
				<?php endif; ?>

				<?php if (isset($error)): ?>
					<div class="alert alert-danger"><?= $error ?></div>
				<?php endif; ?>

				<?= form_open_multipart('siswa/createSave') ?>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" required>
				</div>
				<div class="mb-3">
					<label>Email</label>
					<input type="email" name="email" class="form-control" required>
				</div>
				<div class="mb-3">
					<label>Lembaga</label>
					<select name="lembaga" class="form-control" required>
						<option value="">-- Pilih Lembaga --</option>
						<?php foreach ($lembaga as $l): ?>
							<option value="<?= $l->id ?>"><?= $l->lembaga ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="mb-3">
					<label>Foto</label>
					<input type="file" name="foto" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('siswa') ?>" class="btn btn-secondary">Kembali</a>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</main>
