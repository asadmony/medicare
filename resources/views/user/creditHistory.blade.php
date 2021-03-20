@extends('user.layouts.userMaster')

@push('css')
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Credit History
                    </h3> <br>
                    <h5>
                        Current Credit Balance: <span class="w3-blue px-2 py-1 rounded">{{ auth()->user()->credit }}</span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>From</th>
                                    <th>For</th>
                                    <th>Previous Balance</th>
                                    <th>Transferred</th>
                                    <th>After Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($creditHistory)
                                @foreach ($creditHistory as $history)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ now()->parse($history->transaction_date)->format('d-M-Y H:i a') }}
                                    </td>
                                    <td>
                                       {{ ucfirst($history->transaction_type) }}
                                    </td>
                                    <td>{{ Str::camel($history->credit_from) }}</td>
                                    <td>

                                        @if($history->credit_for == 'taken_course')
                                            <a href="{{ route('user.takenCourseDetails', $history->taken_course_id) }}">
                                                Taken Course
                                            </a>
                                        @elseif($history->credit_for == 'taken_package')
                                            <a href="{{ route('user.takenPackageDetails', $history->taken_package_id) }}">
                                                Taken Package
                                            </a>
                                        @elseif($history->credit_for == 'taken_exam')
                                            <a href="{{ route('user.courseExamAttempt', $history->taken_course_exam_id) }}">
                                                Taken Course Exam <br> Exam Id: {{ $history->taken_course_exam_id }}
                                            </a>
                                        @else
                                            Credit Added to Account
                                        @endif
                                    </td>
                                    <td>{{ $history->previous_credit }}</td>
                                    <td>{{ $history->transferred_credit }}</td>
                                    <td>{{ $history->current_credit }}</td>
                                </tr>
                                @endforeach


                                @endisset
                            </tbody>

                        </table>
                        <div class="text-center">
                            {{ $creditHistory->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
