<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from demo.themefisher.com/focus/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Mar 2022 05:13:48 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assests/admin/images/favicon.png') }}">
    <link href="{{ URL::asset('assests/admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            <i class="fa-lg fa fa-warning"></i>
                                            {!! session('message') !!}
                                        </div>
                                    @elseif(Session::has('error'))
                                        <div class="alert alert-danger">
                                            <i class="fa-lg fa fa-warning"></i>
                                            {!! session('error') !!}
                                        </div>
                                    @endif
                                    <form class="form-horizontal" action="{{ url('addregister') }}" method="post" enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                        <input type="hidden" class="form-control" name="id" id="id" value="">
                                        <div class="form-group">
                                            <label for="">Name:</label>
                                            <input type="text" class="form-control input-default"  name="name" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email:</label>
                                            <input type="text" class="form-control input-default" name="email" id="email" required >
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" required >
                                        </div>
                                        <label for="">Profile Picture:</label>
                            
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgInp" name="profile_image" required>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div  class="input-group mb-3">
                                            <div id="item_img_preview"></div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                        
                                    </form>
                                    <br>
                                    <p>Already have an account? <a class="text-primary" href="{{url('login')}}">Sign in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ URL::asset('assests/admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ URL::asset('assests/admin/js/quixnav-init.js') }}"></script>
    <script src="{{ URL::asset('assests/admin/js/custom.min.js') }}"></script>

    <script type="text/javascript">
        $("#imgInp").change(function() {
      
          $('#item_img_preview').html("");
          var total_file = document.getElementById("imgInp").files.length;
          for (var i = 0; i < total_file; i++) {
            $('#item_img_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' height='60' width='60' >");
          }
        });
        </script>
</body>


<!-- Mirrored from demo.themefisher.com/focus/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Mar 2022 05:13:48 GMT -->

</html>
