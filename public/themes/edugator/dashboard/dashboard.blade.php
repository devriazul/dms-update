@extends(theme('dashboard.layout'))

@section('content')
    @php
        $user_id = $auth_user->id;

        $enrolledCount = \App\Enroll::whereUserId($user_id)->whereStatus('success')->count();
        $wishListed = \Illuminate\Support\Facades\DB::table('wishlists')->whereUserId($user_id)->count();

        $myReviewsCount = \App\Review::whereUserId($user_id)->count();
        $purchases = $auth_user->purchases()->take(10)->get();
    @endphp

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="border-radius-card dashboard-card mb-3 d-flex border p-3 bg-light">
                <div class="card-icon mr-2">
                    <span><i class="la la-user"></i> </span>
                </div>

                <div class="card-info">
                    <div class="text-value"><h4>{{$enrolledCount}}</h4></div>
                    <div>My Courses</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="border-radius-card dashboard-card mb-3 d-flex border p-3 bg-light">
                <div class="card-icon mr-2">
                    <span><i class="la la-medal"></i> </span>
                </div>

                <div class="card-info">
                    <div class="text-value"><h4>{{$my_assignments}}</h4></div>
                    <div>My Total Assignments</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="border-radius-card dashboard-card mb-3 d-flex border p-3 bg-light">
                <div class="card-icon mr-2">
                    <span><i class="la la-certificate"></i> </span>
                </div>

                <div class="card-info">
                    <div class="text-value"><h4>{{ $my_certicates }}</h4></div>
                    <div>My Certificate</div>
                </div>

                {{-- <div class="card-info">
                    <div class="text-value"><h4>{{$myReviewsCount}}</h4></div>
                    <div>My Reviews</div>
                </div> --}}
            </div>
        </div>

    </div>

    <div class="row py-3">
        <div class="col-md-6">
            <div class="border-radius-card p-4 bg-white">
                <h4 class="mb-4">Course Summary</h4>
                <canvas id="doughnut-chart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border-radius-card p-4 bg-white">
                <h4 class="mb-4">Quiz Status</h4>
                <canvas id="bar-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="border-radius-card p-4 bg-white">
        <h4 class="mb-4">
            Assignment Analytics
        </h4>
        <canvas id="line-chart" height="100px"></canvas>
    </div>
    <div class="border-radius-card mt-3 p-4 bg-white ">
        <h4 class="mb-4">
            Cousrse Progress
        </h4>
        @forelse ($get_enroll_courses as $enroll)
        @php $course = App\Course::where('id',$enroll->course_id)->first(); @endphp
        <?php if($course){ ?>
        <div class="d-flex">
            <div class="col-md-4"><p>{{ App\Course::stringSubstr($course->title) }}</p></div>
            <div class="col-md-4">
                <div class="progress mt-2">
                    <div class="progress-bar" role="progressbar" style="width: {{ $course->completed_percent() }}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">{{ $course->completed_percent() }}%</div>
                </div>
            </div>
            <div class="col-md-4">
                @if($course->completed_percent() == 100)
                <a href="{{ URL::to('preview/certificate/portal/'.$enroll->id) }}" target="_blank" class="btn btn-primary">
                    <i class="la la-certificate">Preview Certificate</i>
                </a>
                @else
                    <a href="{{route('course', $course->slug)}}">Continue</a>
                @endif
            </div>
        </div>
        <?php } ?>
        @empty
        <p>No Enroll Courses found</p>
        @endforelse
        
    </div>


    {{-- @if($chartData)
        <div class="p-4 bg-white">
            <h4 class="mb-4">My Earning for the month ({{date('M')}})</h4>

            <canvas id="ChartArea"></canvas>
        </div>
    @endif --}}

                <!-- Modal -->
                <div class="modal fade" id="certificate" tabindex="-1" role="dialog" aria-labelledby="certificateModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Your Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid" src="{{ theme_url('images/Certificate.png') }}" alt="" srcset="">
                        </div>
                        <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-primary">Download</button>
                        </div>
                    </div>
                    </div>
                </div>

    <div class="border-radius-card mt-3 p-4 bg-white">
        <h4 class="mb-4"> My Purchase History </h4>
        @if($purchases->count() > 0)
        

        <table class="table table-striped table-bordered">

            <tr>
                <th>#</th>
                <th>{{__a('amount')}}</th>
                <th>{{__a('method')}}</th>
                <th>{{__a('time')}}</th>
                <th>{{__a('status')}}</th>
                <th>#</th>
            </tr>

            @foreach($purchases as $purchase)
                <tr>
                    <td>
                        <small class="text-muted">#{{$purchase->id}}</small>
                    </td>
                    <td>
                        {!!price_format($purchase->amount)!!}
                    </td>
                    <td>{!!ucwords(str_replace('_', ' ', $purchase->payment_method))!!}</td>

                    <td>
                        <small>
                            {!!$purchase->created_at->format(get_option('date_format'))!!} <br />
                            {!!$purchase->created_at->format(get_option('time_format'))!!}
                        </small>
                    </td>

                    <td>
                        {!! $purchase->status_context !!}
                    </td>
                    <td>
                        @if($purchase->status == 'success')
                            <span class="text-success" data-toggle="tooltip" title="{!!$purchase->status!!}"><i class="fa fa-check-circle-o"></i> </span>
                        @else
                            <span class="text-warning" data-toggle="tooltip" title="{!!$purchase->status!!}"><i class="fa fa-exclamation-circle"></i> </span>
                        @endif

                        <a href="{!!route('purchase_view', $purchase->id)!!}" class="btn btn-primary"><i class="la la-eye"></i> </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    </div>

@endsection

@section('page-js')

    @if($chartData)
        <script src="{{asset('assets/plugins/chartjs/Chart.min.js')}}"></script>

        <script>
            var ctx = document.getElementById("ChartArea").getContext('2d');
            var ChartArea = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode(array_keys($chartData)) !!},
                    datasets: [{
                        label: 'Earning ',
                        backgroundColor: '#216094',
                        borderColor: '#216094',
                        data: {!! json_encode(array_values($chartData)) !!},
                        borderWidth: 2,
                        fill: false,
                        lineTension: 0,
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0, // it is for ignoring negative step.
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return '{{get_currency()}} ' + value;
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(t, d) {
                                var xLabel = d.datasets[t.datasetIndex].label;
                                var yLabel = t.yLabel >= 1000 ? '$' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : '{{get_currency()}} ' + t.yLabel;
                                return xLabel + ': ' + yLabel;
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            });
        </script>
        <script>
            new Chart(document.getElementById("doughnut-chart"), {
                type: 'doughnut',
                data: {
                labels: ["Total Enroll Courses","Favourite Courses", "Running Courses"],
                datasets: [
                    {
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                    data: [{{ $course_module_result }}]
                    }
                ]
                },
            });
        </script>
         <script>
            // Bar chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                labels: ["Quiz1", "Quiz2", "Quiz3", "Quiz4", "Quiz5"],
                datasets: [
                    {
                    label: "Quiz Marks",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [{{ $quizzes_score }}]
                    }
                ]
                },
                options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Last 5 Quiz Marks'
                }
                }
            });
        </script>
        <script>
            new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10'],
                datasets: [{ 
                    data: [<?php echo $assignment_score; ?>],
                    label: "Assignment Marks",
                    borderColor: "#3e95cd",
                    fill: false
                }
                ]
            },
            });
        </script>
    @endif
@endsection
