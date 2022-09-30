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
                                <button type="submit" class="btn btn-primary mb-2"><a href="{{url('addproduct')}}">ADD PRODUCT</a> </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>PRODUCTID</th>
                                                <th>PRODUCT CATEGORY</th>
                                                <th>TITLE</th>
                                                <th>IMAGE</th>
                                                <th>ADD IMAGE</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->cname}}</td>
                                                <td>{{$user->title}}</td>
                                                <td>
                                                    @if($user->item_img!="")
                                                    @php $a = explode(",",$user->item_img); @endphp
                                                    {{-- <a href="{{ url('showproductdetail') }}/{{ $user->id }}"> --}}
                                                        <img src="{{ url('item_img') }}/{{ $a[0] }}" alt="" width="100px" height="100px">
                                                    {{-- </a> --}}
                                                    @else
                                                    <p>Noimage</p>
                                                    @endif
                                                </td>
                                                <td><a href="{{url('addimage')}}/{{ $user->id }}"><button type="submit" class="btn btn-info">ADD IMAGE</button></a></td>
                                                <td><a href="editproduct/{{ $user->id }}"><button type="submit" class="btn btn-primary"><i class="mdi mdi-pencil"></i></button></a></td>
                                                <td><a href="productdelete/{{ $user->id }}"><button type="submit" class="btn btn-danger"><i class="mdi mdi-close"></i></button></a></td>

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
