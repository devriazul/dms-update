@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @if($contacts->count())

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ date('d-m-Y H:i:s',$contact->datetime) }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->country }}</td>
                            <td>{{ $contact->contact_reason }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                @if($contact->status==0)
                                <span class="badge badge-pill badge-danger">New</span>
                                @else
                                <span class="badge badge-pill badge-success">Viewed</span>
                                @endif
                            </td>
                            <td>
                                @if($contact->status==1)
                                <a href="javascript:void(0)" onclick="if(confirm('Are you sure to Delete this Query Data?')) location.href='{{ route('deleteContact',$contact->id) }}'; return false;" class="btn btn-danger">
                                    <i class="la la-trash"></i>
                                </a>
                                @else
                                <a href="{{ route('isViewedContact',$contact->id) }}" class="btn btn-primary">
                                    <i class="la la-eye"></i>
                                </a>
                                @endif
                                
                                
                            </td>
                        </tr>
                    @endforeach

                </table>
            @else
                {!! no_data() !!}
            @endif

            {!! $contacts->links() !!}

        </div>
    </div>

@endsection
