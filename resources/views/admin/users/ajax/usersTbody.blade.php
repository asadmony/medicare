
@foreach($usersAll as $user)


 
    <tr>
        <td width="30">
            <img class="img-responsive" src="{{asset($user->userProfilePic)}}" alt="{{ $user->username }}" width="25" />

        </td>

        <td>


            @if($user->atLeastOneCheckedPP())
                <img class="img-bordered img-rounded" src="{{ asset($user->latestCheckedPP()) }}" width="25" alt="{{ $user->username }}">

            @endif

              
        </td>

        <td>

            {{$user->name}}

           

            
            
        </td>

    <td>{{$user->email}}</td>
    <td>{{$user->mobile}}</td>
    <td>
        <small class="label  {{ $user->active ? 'label-success' : 'label-default' }}">
            {{ $user->active ? 'Active' : 'Deactivated' }}
            </small>

            {{-- @if(!$user->active)
            @if($user->editedby_id and ($user->editedby_id != $user->id))

            <small class="label label-default">
             By: {{ $user->editedBy->email }}
            </small>
            @endif
            @endif

            @if ($user->active)
                  @if($user->editedby_id and ($user->editedby_id != $user->id))
                   <small class="label label-default">
                            Edited By: {{ $user->editedBy->email }}
                   </small>
                  @endif
            @endif --}}
    </td>
        
        
        
        
        <td width="100">
            <div class="btn-group btn-group-xs pull-right">
                
                <a target="_blank" class="btn btn-primary" href="{{ route('admin.userDetailsEdit', $user) }}">Edit</a>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a target="_blank" href="{{ url('/', $user->username) }}">Details</a>
                    </li>
                    <li>
                        <a target="_blank" href="{{route('user.userDetailsPrint', $user)}}">Print <i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.makeUserActive', $user) }}">Make {{ $user->active ? 'Inactive' : 'Active' }}</a>
                    </li>

                    <li>
                        <a target="_blank" href="{{ route('admin.paymentHistoryForUser', $user) }}">Payment History</a>
                    </li>

                    <li>
                        <a title="All: From, To, Pending" target="_blank" href="{{ route('admin.proposalsOfUser', $user) }}">Proposals</a>
                    </li>

                    <li>
                        <a title="User Comment, Admin Comment, comlain, conversation" target="_blank" href="{{ url('admin/user/details/edit/'. $user->id .'#user-comment') }}">Conversation</a>
                    </li>

                    <li>
                        <a title="Send Cv from offline or online users to this user" target="_blank" href="{{ route('admin.sendCvToUser', $user) }}">Send Cv to this user</a>
                    </li>

                   @if($user->file_name)

                    <li>
                        <a title="Send Cv to offline or online users from this user" target="_blank" href="{{ route('admin.sendCvFromUser', $user) }}">Send Cv from this user</a>
                    </li>
                    @endif

                    @if ($user->active)

                    <li>
                        <a href="{{ route('admin.userSms', $user) }}">Send SMS: <span class="sms-count">{{ $user->sms_count }}</span></a>

                    </li>

                    @endif

                    <li>
                        
            <a  href="{{ route('admin.userLogs', $user) }}">Logs: {{ $user->incompleteLogCount() }}, {{ $user->completedLogCount() }}</a>

            
                    </li>
                    
                </ul>
            </div>
 
   
        

       

        </td>
        
    </tr>

    @endforeach