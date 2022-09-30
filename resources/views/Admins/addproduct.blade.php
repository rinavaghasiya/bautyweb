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
                            <h4 class="card-title">ADD PRODUCT</h4>
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

                                <form class="form-horizontal" action="{{ url('insertproduct') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="">Category Name:</label>
                                        <select name="category_id" id="categoryList" class="form-control">
                                            <option selected disabled> Select a category...</option>
                                            @foreach ($category as $cat)
                                                <option value="{!! $cat->id !!}">{!! $cat->cname !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title:</label>
                                        <input type="text" name="title" class="form-control input-default " placeholder="Title...">
                                    </div>

                                    <label for="">Description:</label>
                                    <div class="form-group">
                                        <textarea class="summernote" name="description" ></textarea>
                                    </div>
                                    <label for="">Product Image:</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="item_img[]" id="item_img" data-preview-file-type="text">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                      
                                    </div>
                                    <div  class="input-group mb-3">
                                        <div id="item_img_preview"></div>
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
  $("#item_img").change(function() {

    $('#item_img_preview').html("");
    var total_file = document.getElementById("item_img").files.length;
    for (var i = 0; i < total_file; i++) {
      $('#item_img_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' height='60' width='60' >");
    }
  });


  function checkNum(event) {

    if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event.keyCode == 8)
      return true;
    else {
      return false;
    }

  }

  
</script>


@endsection
