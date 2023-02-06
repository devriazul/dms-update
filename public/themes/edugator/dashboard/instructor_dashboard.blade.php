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
                    <span><i class="la la-globe"></i> </span>
                </div>

                <div class="card-info">
                    <div class="text-value"><h4>{{ $total_course }}</h4></div>
                    <div>My Courses</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="border-radius-card dashboard-card mb-3 d-flex border p-3 bg-light">
                <div class="card-icon mr-2">
                    <span><i class="la la-comment"></i> </span>
                </div>

                <div class="card-info">
                    <div class="text-value"><h4>{{ $total_assignments }}</h4></div>
                    <div>Total Assignments</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="border-radius-card dashboard-card mb-3 d-flex border p-3 bg-light">
                <div class="card-icon mr-2">
                    <span><i class="la la-certificate"></i> </span>
                </div>

                <div class="card-info">
                    <div class="text-value"><h4>{{ $total_quizzes }}</h4></div>
                    <div>Total Quizzes Upload</div>
                </div>
            </div>
        </div>

    </div>

    <div class="p-4 bg-white">
        <h4 class="mb-4">Earning for this month</h4>

        <canvas id="ChartArea"></canvas>
    </div>

@endsection
@section('page-js')
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

@endsection