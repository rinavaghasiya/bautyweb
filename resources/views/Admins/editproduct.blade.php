@extends('Admins.header-footer')
@section('contant')
    <!--**********************************
                    Content body start
                ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-xl-9 col-xxl-12">
                    <a href="{{ url('product') }}"><button type="submit" class="btn btn-success mb-4">SHOW
                            PRODUCT</button></a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">EDIT PRODUCT</h4>
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
                                <form class="form-horizontal" action="{{ url('editmyitem') }}" method="post"
                                    enctype='multipart/form-data'>
                                    {{ csrf_field() }}

                                    <input type="hidden" class="form-control" name="id" id="id"
                                        value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="">Category Name:</label>
                                        <select class="form-control">
                                            <?php $cat=App\Category::get();?>
                                            @foreach($cat as $catagory)
                                            <option value="{{ $catagory->id }}" {{ $data->cid == $catagory->id ? "selected" : "" }}>{{ $catagory->cname }}</option>
                                            @endforeach

                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title:</label>
                                        <input type="text" class="form-control input-default " placeholder="Title..."
                                            name="title" value="{{ $data->title }}">
                                    </div>

                                    <label for="">Description:</label>
                                    <div class="form-group">
                                        <textarea class="summernote" name="description">{{ $data->description }}</textarea>
                                    </div>
                                    <label for="">Product Image:</label>
                                    <div class="input-group mb-3">
                                        
                                        <div class="custom-file">
                                           
                                            <input type="file" class="custom-file-input" id="imgInp" name="image[]"  value="{{ $data->item_img }}">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <br>
                                       
                                        <input type="hidden" name="oldimg" id="oldimg" value="{{ $data->item_img }}">

                                        
                                    </div>
                                    <div class="form-group">
                                    <img id="blah" src="{{ url('item_img') }}/{{ $data->item_img }}"
                                    alt="" height="100" width="100" />
                                    </div>
                                    <div id="item_img_preview"></div>
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

    <script>
        $(document).ready(function() {
    $('.summernote').summernote();
    });
    </script>

    <script type="text/javascript">
        function readURL(input, imgControlName) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $(imgControlName).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            var imgControlName = "#blah";
            readURL(this, imgControlName);

        });
    </script>
    
@endsection
