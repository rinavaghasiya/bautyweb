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
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary mb-2"><a href="{{url('addcatagory')}}">ADD CATEGORY</a> </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>CATEGORY ID</th>
                                                <th>CATEGORY NAME</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->cname}}</td>
                                                <td><a href="{{url('editcategory')}}/{{ $user->id }}"><button type="submit" class="btn btn-primary"><i class="mdi mdi-pencil"></i></button></a></td>
                                                <td><a href="{{url('admindelete')}}/{{ $user->id }}"><button type="submit" class="btn btn-danger"><i class="mdi mdi-close"></i></button></a></td>

                                            </tr>
                                            @endforeach


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
