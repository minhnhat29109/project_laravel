
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/form-login/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/backend/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/backend/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/backend/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Main css -->
    <link rel="stylesheet" href="/form-login/css/style.css">
    <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        i{
            margin-left: 5px;
        }
    </style>
</head>
<body >

    <div class="main">
        <!-- Sing in  Form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title"style="font-family: Arial;">Đăng kí</h2>
                        <form action="{{route('register.post')}}"  method="post" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Họ Tên"/>
                                @error('name')
                                    <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" {{old('email')}} id="email" placeholder=" Địa chỉ Email"/>
                                @error('email')
                                    <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Mật khẩu"/>
                                @error('password')
                                    <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re_pass" placeholder="Nhập lại mật khẩu"/>
                                @error('re_password')
                                    <p class="text-danger text-sm" >{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="phone" id="re_pass" {{old('phone')}} placeholder="Số điện thoại"/>
                                @error('phone')
                                    <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="address" id="re_pass" {{old('address')}} placeholder="Địa chỉ"/>
                                @error('address')
                                    <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group form-button">
                                <button class="btn form-submit text-sm"id="signup" style="font-family: Arial;">Đăng kí</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/form-login/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{route('login.form')}}" class="signup-image-link">Bạn đã có tài khoản?</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
    <script src="/backend/dist/js/demo.js"></script>
    <script src="/form-login/vendor/jquery/jquery.min.js"></script>
    <script src="/form-login/js/main.js"></script>
    <script>
        @if(Session::has('success'))
  		toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
                toastr.error("{{ session('error') }}");
        @endif
        </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>