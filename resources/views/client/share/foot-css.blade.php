<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
    <!-- inject:js-->
    <script src="vendor_assets/js/jquery/jquery-1.12.3.js"></script>
    <script src="vendor_assets/js/bootstrap/popper.js"></script>
    <script src="vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="vendor_assets/js/jquery-ui.min.js"></script>
    <script src="vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="vendor_assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="vendor_assets/js/jquery.waypoints.min.js"></script>
    <script src="vendor_assets/js/masonry.pkgd.min.js"></script>
    <script src="vendor_assets/js/owl.carousel.min.js"></script>
    <script src="vendor_assets/js/select2.full.min.js"></script>
    <script src="vendor_assets/js/slick.min.js"></script>
    <script src="theme_assets/js/locator.js"></script>
    <script src="theme_assets/js/main.js"></script>
    <script src="theme_assets/js/map.js"></script>
    @jquery
@toastr_js
@toastr_render
    <script>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				toastr.error("{{$error}}");
			@endforeach
		@endif
	</script>
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#dangky').click(function(e){
            var email        = $("#email").val();
            var password     = $("#password").val();
            var repassword  = $("#repassword").val();
            var hovaten     = $("#hovaten").val();
            var sodienthoai     = $("#sodienthoai").val();
            var data = {
                'email'    : email,
                'password'    : password,
                'repassword'    : repassword,
                'hovaten'    : hovaten,
                'sodienthoai'    : sodienthoai,
        };
        $.ajax({
                url : '/client/register',
                type: 'post',
                data: data,
                success: function($xxx){
                    toastr.success('Đã tạo mới tài khoản thành công');
                    location.reload();
                },
                error: function($errors){
                    var listErrors = $errors.responseJSON.errors;
                    $.each(listErrors, function(key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });
    });
    $('#dangnhap').click(function(e){
                var email      = $("#email_login").val();
                var password     = $("#password_login").val();
                var data = {
                    'email'    : email,
                    'password'    : password,
            };
            $.ajax({
                    url : '/client/login',
                    type: 'post',
                    data: data,
                    success: function($data){
                        if($data.status == 0){
                            toastr.error($data.message);
                        } else if($data.status == 1) {
                            toastr.warning($data.message);
                        } else {
                            toastr.success($data.message);
                            setTimeout(function(){location.reload()}, 1000);
                        }
                    },
                    error: function($errors){
                        var listErrors = $errors.responseJSON.errors;
                        $.each(listErrors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });
    </script>
<!-- endinject-->
