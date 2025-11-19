<main class="app-main mt-5">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Edit Siswa</h3>
			</div>
			<div class="card-body">

				<?php if (isset($error)) : ?>
					<div class="alert alert-danger"><?= $error ?></div>
				<?php endif; ?>
				<?php if (isset($error_upload)) : ?>
					<div class="alert alert-danger"><?= $error_upload ?></div>
				<?php endif; ?>

				<?= form_open_multipart("siswa/editSave/{$siswa->nis}") ?>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?= set_value('nama', $siswa->nama) ?>"
						required>
				</div>
				<div class="mb-3">
					<label>Email</label>
					<input type="email" name="email" class="form-control"
						value="<?= set_value('email', $siswa->email) ?>" required>
				</div>
				<div class="mb-3">
					<label>Lembaga</label>
					<select name="lembaga" class="form-control" required>
						<option value="">-- Pilih Lembaga --</option>
						<?php foreach ($lembaga as $l) : ?>
							<option value="<?= $l->id ?>" <?= $siswa->lembaga == $l->id ? 'selected' : '' ?>>
								<?= $l->lembaga ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="mb-3">

					<label>Foto</label><br>
					<?php if (!empty($siswa->foto)) : ?>
						<img src="<?= base_url("assets/uploads/{$siswa->foto}") ?>" width="100" class="mb-2"><br>
					<?php endif; ?>
					<input type="file" name="foto" class="form-control">
					<input type="hidden" name="old_foto" value="<?= $siswa->foto ?>">
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('siswa') ?>" class="btn btn-secondary">Kembali</a>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</main>
