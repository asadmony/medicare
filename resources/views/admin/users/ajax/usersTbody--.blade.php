@foreach($usersAll as $user)

@if ($user->isOffline())

<tr>
        <td width="200">
            <img class="img-responsive" src="{{asset($user->userProfilePic)}}" alt="{{ $user->username }}" width="100" />


@if ($user->uploadedPP())

<br>
<b>Width: {{ $user->uploadedPP()->image_width }} px</b> <br>
<b>Height: {{ $user->uploadedPP()->image_height }} px</b>

<div class="checkbox">
<label>
<input class="image-check"
data-url="{{ route('admin.userProfilepicCheck', [$user->uploadedPP(),'checked']) }}" 
type="checkbox"
name="profile_pic_checked"

{{$user->uploadedPP()->checked ? 'checked' : ''}} 


/> Data Checked (Profile Pic) </label>
</div>


@endif
        </td>

        <td>


            @if($user->atLeastOneCheckedPP())
                <img class="img-bordered img-rounded" src="{{ asset($user->latestCheckedPP()) }}" style="width: 70px;" alt="{{ $user->username }}"> is currently live & checked Profile picture. <br>

            @endif

            

            <b>ID: </b> {{ $user->id }} <br>
            <b>Name: </b> {{$user->name}} <br>
            <b>Username: </b> {{$user->username}} <br>
            <b>Mobile: </b> {{ $user->mobile }} <br>
             <b>Email: </b> {{$user->email}} <br>
            <b>Age: </b> {{ $user->age() }} <br>

            

            @if($user->file_name)
            <br> <br>
            <b>CV / Biodata:  </b>

            @if($user->fileIsImage())

                <img width="50" src="{{ asset('img/image.png') }}" alt="CV">

            @elseif($user->fileIsPdf())
            <img width="50" src="{{ asset('img/pdf.png') }}" alt="CV">
            @elseif($user->fileIsWord())
            <img width="50" src="{{ asset('img/word.png') }}" alt="CV">
            @endif

            <a class="btn btn-xs  w3-btn w3-blue pull-right" href="{{ asset('storage/users/cv/'. $user->file_name) }}" download="id_{{ $user->id }}_email_{{ $user->email }}_mobile_{{ $user->mobile }}_cv.{{ $user->file_ext }}">
                 Download
            </a>

            @endif

              
        </td>

        <td>

            <b>Gender: </b> {{$user->gender}} <br>
            <b>Date of Birth: </b> {{$user->dob}} <br>                     
            
            <b>Profile Created at: </b> {{ date('d-M-Y', strtotime($user->created_at)) }} ({{ $user->created_at->diffForHumans() }}) <br>

            <b>Package: </b> {{$user->package}} <br>
            <b>Expire Date:</b> {{$user->expired_at}} <br>
            <b>Validity (Days): </b> {{ $user->packageDuration() }}

            <br> <br>

            <span class="w3-xxlarge w3-dark-gray w3-padding w3-round">Offline Profile</span>
 
        </td>
        
        
        
        
        <td width="100">
            <div class="btn-group btn-group-xs pull-right">
                {{-- <button type="button" data-url="" class="btn btn-primary">Edit</button> --}}
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
                </ul>
            </div>
            <br>

            <br>
            
            <div class="text-center">
                <small class="label  {{ $user->active ? 'label-success' : 'label-default' }}">
                {{ $user->active ? 'Active' : 'Deactivated' }}
                </small>

                @if(!$user->active)
                <small class="label label-default">
                    Deactivated By: {{ $user->editedBy->email }}
                </small>
                @endif

            </div>
            <!-- Edited by -->
            <div>
            @if ($user->active)
                  @if($user->editedby_id and ($user->editedby_id != $user->id))
                   <small class="label label-default">
                            Edited By: {{ $user->editedBy->email }}
                   </small>
                  @endif
            @endif
         </div>
            @if ($user->active)

            <br>

          


            {{-- <a class="btn btn-xs btn-primary pull-right sms-send-to-user" href="" data-url="{{ route('admin.smsSendToUser', $user) }}">Send SMS: <span class="sms-count">{{ $user->sms_count }}</span></a> --}}

            <a class="btn btn-xs btn-primary pull-right" href="{{ route('admin.userSms', $user) }}">Send SMS: <span class="sms-count">{{ $user->sms_count }}</span></a>


            @endif

            <br> <br>

            <a class="btn btn-xs btn-primary pull-right" href="{{ route('admin.userLogs', $user) }}">Logs: {{ $user->incompleteLogCount() }}, {{ $user->completedLogCount() }}</a>
            
        </td>
        
    </tr>

@else
     
 
    <tr>
        <td width="200">
            <img class="img-responsive" src="{{asset($user->userProfilePic)}}" alt="{{ $user->username }}" width="100" />


@if ($user->uploadedPP())

<br>
<b>Width: {{ $user->uploadedPP()->image_width }} px</b> <br>
<b>Height: {{ $user->uploadedPP()->image_height }} px</b>

<div class="checkbox">
<label>
<input class="image-check"
data-url="{{ route('admin.userProfilepicCheck', [$user->uploadedPP(),'checked']) }}" 
type="checkbox"
name="profile_pic_checked"

{{$user->uploadedPP()->checked ? 'checked' : ''}} 


/> Data Checked (Profile Pic) </label>
</div>


@endif
        </td>

        <td>


            @if($user->atLeastOneCheckedPP())
                <img class="img-bordered img-rounded" src="{{ asset($user->latestCheckedPP()) }}" style="width: 70px;" alt="{{ $user->username }}"> is currently live & checked Profile picture. <br>

            @endif

            

            <b>ID: </b> {{ $user->id }} <br>
            <b>Name: </b> {{$user->name}} <br>
            <b>Username: </b> {{$user->username}} <br>
            <b>Mobile: </b> {{ $user->mobile }} <br>
            <b>Guardian Mobile: </b> {{ $user->guardian_mobile }} <br>
            <b>Email: </b> {{$user->email}} <br>

            

            
            <b>Age: </b> {{ $user->age() }} <br>

            <b>Package: </b> {{$user->package}} <br>
            <b>Expire Date:</b> {{$user->expired_at}} <br>
            <b>Validity (Days): </b> {{ $user->packageDuration() }}

            @if($user->file_name)
            <br> <br>
            <b>CV / Biodata:  </b>

            @if($user->fileIsImage())

                <img width="50" src="{{ asset('img/image.png') }}" alt="CV">

            @elseif($user->fileIsPdf())
            <img width="50" src="{{ asset('img/pdf.png') }}" alt="CV">
            @elseif($user->fileIsPdf())
            <img width="50" src="{{ asset('img/word.png') }}" alt="CV">
            @endif

            <a class="btn btn-xs  w3-btn w3-blue pull-right" href="{{ asset('storage/users/cv/'. $user->file_name) }}" download="id_{{ $user->id }}_{{ $user->email }}_mobile_{{ $user->mobile }}_cv">
                 Download
            </a>

            @endif

              
        </td>

        <td>

            <b>Gender: </b> {{$user->gender}} <br>
            <b>Date of Birth: </b> {{$user->dob}} <br>                     
            <b>Country: </b>   
            @if($user->country == 'Other' || $user->country == 'Others')
            {{$user->country_other}}
            @else
            {{$user->country}}
            @endif
            <br>  

            <b>Profile Created By: </b> {{$user->profile_created_by}} <br>
            <b>Looking For: </b> {{$user->looking_for}} <br>
            <b>Religion: </b> {{$user->religion}} <br>
            <b>Social Order: </b> {{ $user->social_order }} <br>
            <b>About: </b> {{ $user->contactInfo? $user->contactInfo->about_me : '' }}
            <br>
            <b>Rating: </b> 
            @include('user.includes.others.stars')
            <br>
            <b>Profile Created at: </b> {{ date('d-M-Y', strtotime($user->created_at)) }} ({{ $user->created_at->diffForHumans() }}) <br>

            <b>Proposal Pending to me: </b>
            {{ $user->pendingProposalToMeCount() }}<br>
            <b>Proposal to me: </b>
            {{ $user->proposalToMeCount() }}<br>
            <b>Proposal sent by me: </b>
            {{ $user->proposalFromMeCount() }}<br> 

            @if ($user->loggedin_at)
                <b>Last Login: {{ $user->loggedin_at }} ({{ $user->loggedin_at->diffForHumans() }})</b>
            @endif

            
            
        </td>
        
        
        
        
        <td width="100">
            <div class="btn-group btn-group-xs pull-right">
                {{-- <button type="button" data-url="" class="btn btn-primary">Edit</button> --}}
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
                    
                </ul>
            </div>
            <br>

            <br>
            
            <div class="text-center">
                <small class="label  {{ $user->active ? 'label-success' : 'label-default' }}">
                {{ $user->active ? 'Active' : 'Deactivated' }}
                </small>

                @if(!$user->active)
                @if($user->editedby_id and ($user->editedby_id != $user->id))

                <small class="label label-default">
                 By: {{ $user->editedBy->email }}
                </small>
                @endif
                @endif

            </div>
            <!-- Edited by -->
            <div>
            @if ($user->active)
                  @if($user->editedby_id and ($user->editedby_id != $user->id))
                   <small class="label label-default">
                            Edited By: {{ $user->editedBy->email }}
                   </small>
                  @endif
            @endif
         </div>
            @if ($user->active)

            <br>


            {{-- <a class="btn btn-xs btn-primary pull-right sms-send-to-user" href="" data-url="{{ route('admin.smsSendToUser', $user) }}">Send SMS: <span class="sms-count">{{ $user->sms_count }}</span></a> --}}

            <a class="btn btn-xs btn-primary pull-right" href="{{ route('admin.userSms', $user) }}">Send SMS: <span class="sms-count">{{ $user->sms_count }}</span></a>

            @endif

            <br> <br>

            <a class="btn btn-xs btn-primary pull-right" href="{{ route('admin.userLogs', $user) }}">Logs: {{ $user->incompleteLogCount() }}, {{ $user->completedLogCount() }}</a>

            
        </td>
        
    </tr>
    @endif
    @endforeach