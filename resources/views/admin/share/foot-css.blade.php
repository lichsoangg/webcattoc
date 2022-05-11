@jquery
@toastr_js
@toastr_render
<script src="/admin/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="/admin/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="/admin/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="/admin/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="/admin/assets/js/scrollbar/simplebar.js"></script>
    <script src="/admin/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="/admin/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="/admin/assets/js/sidebar-menu.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/admin/assets/js/script.js"></script>
    <script>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				toastr.error("{{$error}}");
			@endforeach
		@endif
	</script>
