@extends('Admins.header-footer')
@section('contant')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-xl-6 col-xxl-12">
                <a href="{{url('showuser')}}"><button type="submit" class="btn btn-success mb-4">SHOW USER</button></a>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sign up your account</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
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












<script type="text/javascript">
    $("#imgInp").change(function() {
  
      $('#item_img_preview').html("");
      var total_file = document.getElementById("imgInp").files.length;
      for (var i = 0; i < total_file; i++) {
        $('#item_img_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' height='60' width='60' >");
      }
    });
    </script>
@endsection