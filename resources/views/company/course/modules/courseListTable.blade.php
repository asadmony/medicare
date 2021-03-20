<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>No of Users</th>
                    <th>No of Attempts</th>
                    <th>Attempt Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>

                <?php $i = (($allTakenCourses->currentPage() - 1) * $allTakenCourses->perPage() + 1); ?>
                @foreach ($allTakenCourses as $takenCourse)

                <tr>
                    <td>{{$i}}</td>
                    <td>{{$takenCourse->course->course_code}}</td>
                    <td>{{$takenCourse->course->title}}</td>
                    <td>
                        {{$takenCourse->takenCompanyUsers()->count()}}
                    </td>
                    <td>
                        @if (isset($subrole) && $subrole->title == 'assessor')
                        <a href="{{ route('assessor.takenCourseAttempts', [$subrole, $takenCourse->id]) }}">
                        @else
                        <a href="{{ route('company.takenCourseAttempts', [$company, $takenCourse->id]) }}">
                        @endif
                            {{$takenCourse->takenExamsCount()}}
                        </a>
                        <td>{{$takenCourse->attempt_duration}}</td>
                    </td>
                    <td>
                        <div class="btn-group btn-group-xs">
                            @if (isset($subrole) && $subrole->title != 'member' )
                            <a class="btn btn-primary btn-xs"
                            href="{{route('assessor.assignCourse',[$subrole,$takenCourse->takenPackage->id,$takenCourse->course->id])}}">assign this course</a>
                            @else
                            <a class="btn btn-primary btn-xs"
                            href="{{route('company.courseDetails',[$company,$takenCourse])}}">Details</a>
                            @endif
                        </div>
                    </td>

                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>

        </table>

        {{ $allTakenCourses->render() }}

    </div>
</div>