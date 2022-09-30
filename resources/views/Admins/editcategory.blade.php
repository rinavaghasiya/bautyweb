@extends('Admins.header-footer')
@section('contant')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row justify-content-center mt-4">
                    <div class="col-xl-6 col-xxl-12">
                        <a href="{{url('category')}}"><button type="submit" class="btn btn-success mb-4">SHOW CATEGORY</button></a>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">EDIT CATEGORY</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(Session::has('message'))
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
                                    
                                  <form class="form-horizontal" action="{{ url('updatecat')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">Category Name:</label>
                                            <input type="text" class="form-control input-default " placeholder="Category Name..."  value="{{ $data->cname }}" onkeypress="return checkNum(event)"  name="cname" id="cname" ><p id="cname_validation"></p>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">EDIT</button>
                                        <button type="submit" class="btn btn-primary mb-2">CANCEL</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        
        <script type ="text/javascript">
        
        function checkNum(event)
        {
        
           if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event.keyCode == 8 || event.keyCode == 32)
              return true;
           else
           {
               return false;
           }
        
        }
           
        $("#cname").focusout(function()
           {
              var cname = $("#cname").val();
           if(cname == '')
           {
              $("#cname").css({"border-color": "red", "border-style":"solid"});
              document.getElementById("cname_validation").innerHTML = "<font style=color:red> Please Enter cname</font>";
           }
        });
        
        
        </script>


@endsection
