<div class="table-responsive">
    <table class="table table-hover table-sm table-bordered text-center">
        <thead>
            <tr class="nowrap">
                <th>Users <i class="fa fa-arrow-down"></i> \ Courses <i
                        class="fa fa-arrow-right"></i></th>
                @foreach ($courses as $course )
                <th>{{ $course->course_code }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($subroles as $role)

            <tr class="nowrap">

                <th>{{ $role->user ? $role->user->email : '' }}</th>
                @foreach ($courses as $c)
                @php
                $status = $role->latestAttempt($c->id);
                @endphp
                @if ($status == null)
                <td class="w3-blue">
                    not yet taken
                @elseif($status->certificate_file)
                    @if (now()->subDays(365) > $status->last_attempt_started_at)
                <td class="w3-red">
                    {{ now()->parse($status->last_attempt_started_at)->toDateString() }}
                    @elseif(now()->subDays(270) > $status->last_attempt_started_at)
                <td class="w3-yellow">
                    {{ now()->parse($status->last_attempt_started_at)->toDateString() }}
                    @else
                <td class="w3-green">
                    {{ now()->parse($status->last_attempt_started_at)->toDateString() }}
                    @endif

                    @else
                <td class="w3-blue">
                    incomplete
                    @endif
                    {{-- <a  href="{{ route('company.message', [$company,$role->user_id]) }}" class="px-2">
                        <i class="fas fa-comments"></i>
                    </a> --}}
                    <a  data-toggle="modal" data-target="#message_modal_{{ $role->id }}_{{ $c->id }}" href="" class="px-2">
                        <i class="fas fa-comments"></i>
                    </a>
                    <div class="modal fade" id="message_modal_{{ $role->id }}_{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog w3-white" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-left" id="exampleModalLabel">Message to: {{ $role->user->email }} <br>Course:  {{ $c->course_code }} 
                                </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('send.message', $role->user_id) }}" method="post">
                                    @csrf
                                    @if (isset($company))
                                    <input type="hidden" name="role_from" value="company_owner">
                                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                                    @elseif(isset($subrole))
                                    <input type="hidden" name="role_from" value="company_{{ $subrole->title }}">
                                    <input type="hidden" name="company_id" value="{{ $subrole->company_id }}">
                                    @else
                                    @endif
                                    @if (isset($status->taken_course_id) && $status->taken_course_id != null)
                                        <input type="hidden" name="messageable_id" value="{{ $status->taken_course_id }}">
                                        <input type="hidden" name="messageable_type" value="App\Model\TakenCourse">
                                    @else
                                        <input type="hidden" name="messageable_id" value="{{ $c->id }}">
                                        <input type="hidden" name="messageable_type" value="App\Model\Course">
                                    @endif
                                    
                      
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" name="message" placeholder="Type your message" aria-label="Type your comment" >
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text w3-purple btn-sm"> 
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <div>
                                        @if (isset($status) && $status != null)
                                        @if($status->takenCourse->showMessages($role->user_id)->count() > 0)
                                        <ul class="list-group">
                                            @foreach ($status->takenCourse->showMessages($role->user_id) as $message)
                                            <li class="list-group-item p-1">
                                                {{ $message->message }} <div  style="font-size:xx-small;">{{ now()->parse($message->created_at)->format('d-M-Y h:m A') }}</div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
                @endforeach
            </tr>

            @endforeach
        </tbody>

    </table>

</div>