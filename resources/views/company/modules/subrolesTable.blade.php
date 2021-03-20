<div class="table-responsive">


    <table class="table table-hover table-sm table-bordered text-center">


        <thead>
            <tr>
                <th>SL</th>
                <th>Role Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>No. of Taken Courses</th>
                <th>No. of Attempts</th>
                {{-- <th>Zone/Area</th> --}}
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php $i = 1; ?>

            <?php $i = (($subroles->currentPage() - 1) * $subroles->perPage() + 1); ?>

            @foreach($subroles as $role)


            <tr>

                <td>{{ $i }}</td>
                <td>{{ $role->title }} @if(isset($type) && $type == 'assesor') ({{ $role->level }}) @endif </td>
                <td>{{ $role->user ? $role->user->name : '' }}</td>
                <td>{{ $role->user ? $role->user->email : '' }}</td>
                <td>{{ $role->user ? $role->user->mobile : "" }}</td>
                <td>
                    @if (isset($subrole) && $subrole->title != 'member' )
                    <a href="{{ route('assessor.subroleTakenCourse', [$subrole, $role->id]) }}">
                        {{ $role->takenCourses->where('company_id', $subrole->company_id)->count() }} view all
                    </a>
                    @else
                    <a href="{{ route('company.subroleTakenCourse', [$company, $role->id]) }}">
                        {{ $role->takenCourses->where('company_id', $company->id)->count() }} view all
                    </a>
                    @endif
                </td>
                <td>
                    @if (isset($subrole) && $subrole->title != 'member' )
                    <a href="{{ route('assessor.subroleExamAttempts', [$subrole, $role->id]) }}">
                        {{ $role->takenCourseAttempts->where('total_question', '<>', null)->count() }} view all
                    </a>
                    {{-- @elsif (isset($subrole) && ($subrole->title == 'assessor' || $subrole->title == 'administrator') )
                    <a href="{{ route('assessor.CourseExamAttempt', [$role->id, $role->id]) }}">
                        {{ $role->takenCourseAttempts->where('total_question', '<>', null)->count() }} view all
                    </a> --}}
                    @else
                    <a href="{{ route('company.subroleExamAttempts', [$company, $role->id]) }}">
                        {{ $role->takenCourseAttempts->where('total_question', '<>', null)->count() }} view all
                    </a>
                    @endif
                </td>
                {{-- <td>{{ $role->zone }}</td> --}}
                <td>{{ $role->user ? ($role->user->active ? 'Active' : 'Inactive') : '' }}</td>
                <td>
                    @if (isset($subrole) && $subrole->title == "assessor")
                    <a href="{{ route('subrole.message', [$subrole, $role->user_id,'role_from'=>'company_assessor']) }}" class="btn w3-blue btn-xs"> <i class="fas fa-comments"></i> </a>
                    <div class="btn-group btn-group-xs">
                        <a class="btn btn-primary btn-xs"
                            href="{{ route('assessor.assessorAllPackages', $subrole) }}">Assign course
                        </a>
                    </div>
                    @elseif(isset($subrole) && $subrole->title == "administrator")
                    <a href="{{ route('subrole.message', [$subrole, $role->user_id]) }}" class="btn w3-blue btn-xs"> <i class="fas fa-comments"></i> 
                    </a>
                    <div class="btn-group btn-group-xs">

                        <a class="btn btn-primary btn-xs"
                            href="{{ route('administrator.subroleEdit',[$subrole,$role]) }}">Edit
                        </a>
                        <a class="btn btn-danger btn-xs"
                            onclick="return confirm('Do you really want to delete this role?');"
                            href="{{ route('administrator.subroleDelete',[$subrole,$role]) }}">Delete
                        </a>
                    </div>
                    @else
                    <div class="btn-group btn-group-xs">
                        @if (isset($role->user_id))
                        <a href="{{ route('company.message', [$company,$role->user_id]) }}" class="btn w3-blue mx-1"><i
                            class="fas fa-comments"></i>
                        </a>
                        @endif
                        <a class="btn btn-primary btn-xs"
                            href="{{ route('company.subroleEdit',[$company,$role]) }}">Edit
                        </a>
                        <a class="btn btn-danger btn-xs"
                            onclick="return confirm('Do you really want to delete this role?');"
                            href="{{ route('company.subroleDelete',[$company,$role]) }}">Delete
                        </a>
                    </div>
                    @endif
                </td>

            </tr>

            <?php $i++; ?>

            @endforeach
        </tbody>

    </table>

    {{ $subroles->render() }}

</div>
