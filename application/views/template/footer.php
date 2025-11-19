<!--end::App Main-->
<!--begin::Footer-->
<footer class="app-footer">
	<!--begin::To the end-->
	<div class="float-end d-none d-sm-inline">Anything you want</div>
	<!--end::To the end-->
	<!--begin::Copyright-->
	<strong>
		Copyright &copy; 2014-2025&nbsp;
		<a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
	</strong>
	All rights reserved.
	<!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script
	src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
	crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
	crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="<?= base_url("assets/adminlte/js/adminlte.js") ?>"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
	const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
	const Default = {
		scrollbarTheme: 'os-theme-light',
		scrollbarAutoHide: 'leave',
		scrollbarClickScroll: true,
	};
	document.addEventListener('DOMContentLoaded', function() {
		const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
		if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
			OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
				scrollbars: {
					theme: Default.scrollbarTheme,
					autoHide: Default.scrollbarAutoHide,
					clickScroll: Default.scrollbarClickScroll,
				},
			});
		}
	});
</script>

<!-- Custom -->
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>

<!-- JSZip untuk Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- pdfmake untuk PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Buttons HTML5 & Print -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			responsive: true,
			autoWidth: false,
			pageLength: 10,
			dom: 'Bfrtip', // letak tombol
			buttons: [
				'copy', // copy to clipboard
				'csv', // export CSV
				'excel', // export Excel
				'pdf', // export PDF
				'print', // print
				'colvis' // show/hide columns
			],
			columnDefs: [{
					targets: [2, 3],
					searchable: true
				}, // nis dan nama bisa dicari
				{
					targets: '_all',
					searchable: false
				} // kolom lain tidak bisa dicari
			]
		});
	});
</script>

<!--end::Script-->
</body>
<!--end::Body-->

</html>
