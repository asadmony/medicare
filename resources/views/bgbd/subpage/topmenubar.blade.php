<section class="pt-5 mt-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 profile_menu_border">
          <ul class="nav nav-tabs p-4">
            <li class="nav-item pl-3">
              <a href="{{route('users.mydashboard')}}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">My Dashboard</a>
            </li>
            <li class="nav-item pl-3">
            <a href="{{route('users.myprofile')}}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">My Profile</a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ route('user.pending_receive_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Sent</a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ route('user.accepted_receive_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Accepted</a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ route('user.pending_sent_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest by me Receive</a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ route('user.accepted_sent_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Accepted</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>