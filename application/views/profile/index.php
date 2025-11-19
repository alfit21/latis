<main class="app-main mt-5">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Profile Siswa</h3>
			</div>
			<div class="card-body">
				<form method="get" action="<?= base_url('profile/show') ?>">
					<div class="mb-3">
						<label>Pilih Siswa</label>
						<select name="nis" class="form-control" onchange="this.form.submit()">
							<option value="">-- Pilih Siswa --</option>
							<?php foreach ($siswa_list as $s): ?>
								<option value="<?= $s->nis ?>"
									<?= isset($selected_siswa) && $selected_siswa->nis == $s->nis ? 'selected' : '' ?>>
									<?= $s->nama ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				</form>
				<?php if ($selected_siswa): ?>
					<div class="mt-4">
						<h4><?= $selected_siswa->nama ?></h4>
						<p>Position: <?= $selected_siswa->lembaga_name ?></p>
						<?php if ($selected_siswa->foto && file_exists('./assets/uploads/' . $selected_siswa->foto)): ?>
							<img src="<?= base_url('assets/uploads/' . $selected_siswa->foto) ?>" alt="Foto"
								class="img-thumbnail" width="200">
						<?php else: ?>
							<p>No Image</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
