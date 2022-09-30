@extends('Admins.header-footer')
@section('contant')

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center mb-4">ADMIN PROFILE</h4>
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
                                         <form class="form-horizontal" action="{{ url('profileupdate') }}" method="post" enctype='multipart/form-data' >
                                        {{ csrf_field() }}
                                        <input type="hidden" class="form-control" name="id" id="id" value="{{ $a->id }}">
                                        <div class="form-group">
                                            <label for="">Name:</label>
                                            <input type="text" class="form-control input-default" onkeypress="return checkNum(event)"  name="name" id="name" value="{{ $a->name }}"><p id="name_validation"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email:</label>
                                            <input type="text" class="form-control input-default" name="email" id="email" value="{{ $a->email }}"><p id="email_validation"></p>
                                        </div>
                                        <label for="">Profile Picture:</label>
                            
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgInp" name="image" value="{{$a->profile_image}}">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <img class="mb-2" id="blah" src="{{ url('image') }}/{{ $a->profile_image }}" alt="" height="100" width="100" />
                                            <input type="hidden"  name="oldimg" id="oldimg" value="{{ $a->profile_image }}">            
                                            <br><br>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
                                        <button type="submit" class="btn btn-primary mb-2">CANCEL</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        
        <script type ="text/javascript">
        
        function readURL(input, imgControlName) 
                {
                  if (input.files && input.files[0]) 
                  {
                    var reader = new FileReader();
                    reader.onload = function(e) 
                    {
                     
                      $(imgControlName).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                  }
                }
        
            $("#imgInp").change(function() {
              var imgControlName = "#blah";
              readURL(this, imgControlName);
            
            });
        
        function checkNum(event)
        {
        
           if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event.keyCode == 8)
              return true;
           else
           {
               return false;
           }
        
        }
        
           
        $("#name").focusout(function()
           {
              var name = $("#name").val();
           if(name == '')
           {
              $("#name").css({"border-color": "red", "border-style":"solid"});
              document.getElementById("name_validation").innerHTML = "<font style=color:red> Please enter name</font>";
           }
           else 
             {
              var a=/^[A-Za-z\s]+$/;
        
              if(!name.match(a))
              {
                 $("#name").css({"border-color": "red","border-style":"solid"});
              document.getElementById("name_validation").innerHTML = "<font style=color:red>Name can have only alphabets, spaces and dashes</font>";
              }
              else
              {
                 $("#name").css({"border-color": "black","border-style":"solid"});
              document.getElementById("name_validation").innerHTML = "<font style=color:white></font>";
              }
        
           }
        });
        
         $("#email").focusout(function()
           {
              var email = $("#email").val();
           if(email == '')
           {
        
              $("#email").css({"border-color": "red","border-style":"solid"});
              document.getElementById("email_validation").innerHTML = "<font style=color:red> Please enter email</font>";
           }
           else if(email !='')
           {
              var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
              if(!regex.test(email))
              {
                 $("#email").css({"border-color": "red","border-style":"solid"});
              document.getElementById("email_validation").innerHTML = "<font style=color:red>Enter valid email</font>";
              }
              else
              {
                 $("#email").css({"border-color": "black","border-style":"solid"});
              document.getElementById("email_validation").innerHTML = "<font style=color:white></font>";
              }
           }
        });
        
        </script>

@endsection
   

