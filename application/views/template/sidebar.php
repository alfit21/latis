<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
	<!--begin::Sidebar Brand-->
	<div class="sidebar-brand">
		<!--begin::Brand Link-->
		<a href="<?= base_url() ?>" class="brand-link">
			<!--begin::Brand Text-->
			<span class="brand-text fw-light">Latis</span>
			<!--end::Brand Text-->
		</a>
		<!--end::Brand Link-->
	</div>
	<!--end::Sidebar Brand-->
	<!--begin::Sidebar Wrapper-->
	<div class="sidebar-wrapper">
		<nav class="mt-2">
			<!--begin::Sidebar Menu-->
			<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
				aria-label="Main navigation" data-accordion="false" id="navigation">
				<!-- Admin -->
				<li class="nav-item">
					<a href="<?= base_url('admin') ?>" class="nav-link">
						<i class="nav-icon bi bi-person-badge"></i>
						<p>Admin</p>
					</a>
				</li>

				<!-- Profile -->
				<li class="nav-item">
					<a href="<?= base_url('profile') ?>" class="nav-link">
						<i class="nav-icon bi bi-person"></i>
						<p>Profile</p>
					</a>
				</li>



				<!-- Siswa -->
				<li class="nav-item">
					<a href="<?= base_url('siswa') ?>" class="nav-link">
						<i class="nav-icon bi bi-people"></i>
						<p>Siswa</p>
					</a>
				</li>

				<!-- Logout -->
				<li class="nav-item">
					<a href="<?= base_url('logout') ?>" class="nav-link text-danger">
						<i class="nav-icon bi bi-box-arrow-right"></i>
						<p>Logout</p>
					</a>
				</li>

			</ul>
			<!-- /.sidebar-menu -->

			<!--end::Sidebar Menu-->
		</nav>
	</div>
	<!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
<!--begin::App Main-->
