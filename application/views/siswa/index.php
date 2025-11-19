<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0">Siswa</h3>
				</div>
				<div class="col-sm-6 text-end">
					<a href="<?= base_url('siswa/create') ?>" class="btn btn-sm btn-info">Tambah Siswa</a>
				</div>

				<a href="<?= base_url('siswa/export_excel?lembaga_id=' . $this->input->get('lembaga_id')) ?>"
					class="btn btn-success btn-sm">
					Export Excel
				</a>

			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content Header-->
	<!--begin::App Content-->
	<div class=" app-content">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="card">
				<div class="card-header">
					<div class="row">
						<?php if ($this->session->flashdata('success')): ?>
							<div class="alert alert-success">
								<?= $this->session->flashdata('success') ?>
							</div>
						<?php endif; ?>
						<div class="col-md-2">
							<h3 class="card-title">Data Siswa</h3>
						</div>
						<div class="col-md-10 text-end">
							<form method="get" action="<?= base_url('siswa') ?>">
								<select name="lembaga_id" class="form-select me-2" onchange="this.form.submit()">
									<option value="all">Semua Lembaga</option>
									<?php foreach ($lembaga as $l): ?>
										<option value="<?= $l->id ?>"
											<?= ($this->input->get('lembaga_id') == $l->id) ? 'selected' : '' ?>>
											<?= $l->lembaga ?>
										</option>
									<?php endforeach; ?>
								</select>
								<noscript><input type="submit" value="Filter" class="btn btn-primary"></noscript>
							</form>
						</div>
					</div>
				</div>

				<div class="card-body">
					<table id="example" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Lembaga</th>
								<th>Email</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($siswa as $s): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td>
										<?php if ($s->foto && file_exists(FCPATH . 'assets/uploads/' . $s->foto)): ?>
											<img src="<?= base_url('assets/uploads/' . $s->foto) ?>" alt="<?= $s->nama ?>"
												width="50" height="50" class="rounded-circle">
										<?php else: ?>
											<img src="<?= base_url('assets/uploads/default.png') ?>" alt="Foto" width="50"
												height="50" class="rounded-circle">
										<?php endif; ?>
									</td>
									<td><?= $s->nis ?></td>
									<td><?= $s->nama ?></td>
									<td><?= $s->lembaga_nama ?></td>
									<td><?= $s->email ?></td>
									<td>
										<a href="<?= base_url('siswa/edit/' . $s->nis) ?>" class="btn btn-sm btn-primary">Edit</a>
										<a href="<?= base_url('siswa/delete/' . $s->nis) ?>" class="btn btn-sm btn-danger">Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>


			</div>

			<!-- /.row (main row) -->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content-->
</main>
