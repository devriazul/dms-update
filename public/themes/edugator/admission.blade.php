@extends('layouts.theme')

@section('content')


    <div class="blog-post-page-header bg-dark-blue text-white text-center py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-3">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant</th>
                    <th>Course</th>
                    <th>Intake</th>
                    <th>Status</th>
                    <th>Registration Email</th>
                    <th>Enrolment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DMS-1</td>
                    <td>name-1</td>
                    <td>Course-1</td>
                    <td>Feb-2023</td>
                    <td>Paid</td>
                    <td>email@mail.com</td>
                    <td>Enrolled</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-2</td>
                    <td>name-2</td>
                    <td>Course-2</td>
                    <td>Feb-2023</td>
                    <td>Initial</td>
                    <td>email@mail.com</td>
                    <td>Pending</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-3</td>
                    <td>name-3</td>
                    <td>Course-3</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-4</td>
                    <td>name-4</td>
                    <td>Course-4</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-5</td>
                    <td>name-5</td>
                    <td>Course-5</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-6</td>
                    <td>name-6</td>
                    <td>Course-6</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-7</td>
                    <td>name-7</td>
                    <td>Course-7</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-8</td>
                    <td>name-8</td>
                    <td>Course-8</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
                <tr>
                    <td>DMS-9</td>
                    <td>name-9</td>
                    <td>Course-9</td>
                    <td>Feb-2023</td>
                    <td>unpaid</td>
                    <td>email@mail.com</td>
                    <td>not enroll</td>
                    <td><a href="" title="Edit"><i class="la la-pencil p-1 bg-warning rounded text-white"></i></a> <a href="" title="Delete"><i class="la la-trash p-1 bg-danger rounded text-white"></i></a></td>
                </tr>
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot> --}}
        </table> 
    </div>
    
@endsection
