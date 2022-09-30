@extends('Admins.header-footer')
@section('contant')
  <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>PRODUCT ID</th>
                                                <th>TITLE</th>
                                                <th>IMAGE</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($data as $pro)
                                                <td>{{$pro->id}}</td>
                                                <td>{{$pro->proid}}</td>
                                                <td>{{$pro->ptitle}}</td>
                                                <td><img src="{{ url('pimage')}}/{{$pro->pimage}}" alt="" width="100px" height="100px"></td>
                                                <td><a href="{{url('editproductimage')}}/{{$pro->id}}"><button type="submit" class="btn btn-primary"><i class="mdi mdi-pencil"></i></button></a></td>
                                                <td><a href="{{url('deleteimage')}}/{{$pro->id}}"><button type="submit" class="btn btn-danger"><i class="mdi mdi-close"></i></button></a></td>
                                                @endforeach
                                            </tr> 
                                        </tbody>
                                    </table>
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


        @endsection
