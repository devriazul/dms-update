@extends('layouts.admin')

@section('page-header-right')
    <a href="{{route('categoryCreate')}}" class="btn btn-info" data-toggle="tooltip" title="Create"> <i class="la la-plus-circle"></i> Create </a>
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            @if($all->count())

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    @foreach($all as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                @if($row->status==0)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if($row->status==1)
                                <a href="javascript:void(0)" onclick="if(confirm('Are you sure to Delete this Blog Category Data?')) location.href='{{ route('categoryDelete',$row->slug) }}'; return false;" class="btn btn-danger">
                                    <i class="la la-trash"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="if(confirm('Are you sure to Activate Blog Category Data?')) location.href='{{ route('categoryActivate',$row->slug) }}'; return false;" class="btn btn-success">
                                    <i class="la la-arrow-circle-left"></i>
                                </a>
                                @else
                                <a href="javascript:void(0)" onclick="if(confirm('Are you sure to Deactivate this Blog Category Data?')) location.href='{{ route('categoryDeactivate',$row->slug) }}'; return false;" class="btn btn-success">
                                    <i class="la la-arrow-circle-right"></i>
                                </a>
                                @endif
                                <a href="{{ route('categoryCreate',$row->slug) }}" class="btn btn-primary">
                                    <i class="la la-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            @else
                {!! no_data() !!}
            @endif

            {!! $all->links() !!}

        </div>
    </div>

@endsection
