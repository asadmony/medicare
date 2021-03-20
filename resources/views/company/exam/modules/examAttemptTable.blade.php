<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>User</th>
                <th>Attempt Date</th>
                <th>Exam ID</th>
                <th>Total Questions</th>
                <th>Correct Answer</th>
                <th>Result</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>

            <?php $i = (($takenAttempts->currentPage() - 1) * $takenAttempts->perPage() + 1); ?>
            @foreach ($takenAttempts as $attempt)

            <tr>
                <td>{{$i}}</td>
                <td>{{$attempt->course->course_code}}</td>
                <td>{{$attempt->course->title}}</td>
                <td>{{ $attempt->user->email }}</td>
                <td>{{ now()->parse($attempt->last_attempt_started_at)->format('d-M-Y h:m A') }}</td>
                <td>{{ $attempt->id }}</td>
                <td>{{ $attempt->total_question }}</td>
                <td>{{ $attempt->correct_answer }}</td>
                <td>{{ round($attempt->correct_answer/$attempt->total_question*100, 2) }}%</td>
                <td class="d-flex">
                    @if (isset($company))
                    <a href="{{ route('company.courseExamAttemptDetails',[$company, $attempt]) }}"
                        class="btn btn-info">Details</a>
                    @elseif(isset($role) && isset($accessRole) && 
                        $accessRole != 'member')
                    <a href="{{ route('assessor.CourseExamAttempt',[$role, $attempt]) }}"
                            class="btn btn-info">Details</a>
                    @elseif(isset($subrole))
                    <a href="{{ route('subrole.CourseExamAttempt',[$subrole, $attempt]) }}"
                        class="btn btn-info">Details</a>
                    @else
                    <a href="{{ route('user.courseExamAttempt',$attempt) }}" class="btn btn-info">Details</a>
                    @endif
                    @if ($attempt->correct_answer/$attempt->total_question*100 >= config('parameter.pass_score'))
                    <a href="{{ asset('storage/'.$attempt->certificate_file) }}" target="_blank"
                        class="btn btn-success btn-sm ml-1 py-1 px-1">
                        Certificate</a>
                    @endif
                </td>

            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>

    </table>

    {{ $takenAttempts->render() }}

</div>
