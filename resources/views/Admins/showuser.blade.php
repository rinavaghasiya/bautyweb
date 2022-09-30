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
                                                <th>USER ID</th>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>PROFILE</th>
                                                <th>DELETE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>  <img src="{{ url('image') }}/{{$user->profile_image}}" alt="" width="100px" height="100px"></td>
                                                {{-- <td><a href="{{url('editcategory')}}/{{ $user->id }}"><button type="submit" class="btn btn-primary"><i class="mdi mdi-pencil"></i></button></a></td> --}}
                                                <td><a href="{{url('deleteuser')}}/{{ $user->id }}"><button type="submit" class="btn btn-danger"><i class="mdi mdi-close"></i></button></a></td>

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
