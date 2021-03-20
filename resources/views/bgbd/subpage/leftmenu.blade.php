@php
$rname = \Request::route()->getName();
@endphp
<div class="col-sm-3  profile_menu_border d-none d-sm-block">
  <ul class="nav flex-column profile_login_menu">
    <div class="menu_title py-3">
      QUICK MENU
    </div>
    <li class="nav-item ">
      <a class="nav-link menu_bold">Partner Search</a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.favorites') !!}"
        class="nav-link @if($rname=='user.favorites') {{ 'menu_bold_active' }} @endif">
        My Favourites
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('most_view') !!}" class="nav-link @if($rname=='most_view') {{ 'menu_bold_active' }} @endif">
        Most View
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('users.advanceSearch.showForm') !!}" class="nav-link @if($rname=='users.advanceSearch.showForm') {{ 'menu_bold_active' }} @endif">
        Advance Search
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('users.mymatches') }}" class="nav-link @if($rname=='users.mymatches') {{ 'menu_bold_active' }} @endif">
        My Matches
      </a>
    </li>

    <li class="nav-item ">
      <a class="nav-link menu_bold">My mail box</a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.inbox') !!}" class="nav-link @if($rname=='user.inbox') {{ 'menu_bold_active' }} @endif">
        Receive Message
        @if (\App\Common::message_notification(Auth::user()->id))
        <span class="badge badge-success">{{ \App\Common::message_notification(Auth::user()->id) }}</span>
        @endif
      </a>
    </li>

    <li class="nav-item">
      <a href="{!! route('user.sent') !!}" class="nav-link @if($rname=='user.sent') {{ 'menu_bold_active' }} @endif">
        Sent Message
      </a>
    </li>


    <li class="nav-item ">
      <a class="nav-link menu_bold">Express interest to me</a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.pending_receive_interest') !!}"
        class="nav-link @if($rname=='user.pending_receive_interest') {{ 'menu_bold_active' }} @endif">
        Sent
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.accepted_receive_interest') !!}"
        class="nav-link @if($rname=='user.accepted_receive_interest') {{ 'menu_bold_active' }} @endif">
        Accepted
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.ignore_receive_interest') !!}"
        class="nav-link @if($rname=='user.ignore_receive_interest') {{ 'menu_bold_active' }} @endif">
        Ignore
      </a>
    </li>

    <li class="nav-item ">
      <a class="nav-link menu_bold">Express interest by me</a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.pending_sent_interest') !!}"
        class="nav-link @if($rname=='user.pending_sent_interest') {{ 'menu_bold_active' }} @endif">
        Receive
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.accepted_sent_interest') !!}"
        class="nav-link @if($rname=='user.accepted_sent_interest') {{ 'menu_bold_active' }} @endif">
        Accepted
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.ignore_sent_interest') !!}"
        class="nav-link @if($rname=='user.ignore_sent_interest') {{ 'menu_bold_active' }} @endif">
        Ignore
      </a>
    </li>


    <li class="nav-item ">
      <a class="nav-link menu_bold">Package</a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.quote') !!}"
        class="nav-link @if($rname=='user.quote') {{ 'menu_bold_active' }} @endif">Package
        Status
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('user.purchaseHistory') !!}"
        class="nav-link @if($rname=='user.purchaseHistory') {{ 'menu_bold_active' }} @endif">Purchase Invoice
      </a>
    </li>


    <li class="nav-item ">
      <a class="nav-link menu_bold">My profile and account</a>
    </li>
    <li class="nav-item ">
      <a href="{!! route('users.privacy') !!}"
        class="nav-link @if($rname=='users.privacy') {{ 'menu_bold_active' }} @endif">
        Privacy Settings
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('users.photos.index') !!}"
        class="nav-link @if($rname=='users.photos.index') {{ 'menu_bold_active' }} @endif">
        My Photos
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('users.documents') !!}"
        class="nav-link @if($rname=='users.documents') {{ 'menu_bold_active' }} @endif">
        My Documents
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('users.password.edit') !!}"
        class="nav-link @if($rname=='users.mchangePassword') {{ 'menu_bold_active' }} @endif">Change Password
      </a>
    </li>

    <li class="nav-item">
      <a href="{!! route('user.contact_list') !!}"
        class="nav-link @if($rname=='user.contact_list') {{ 'menu_bold_active' }} @endif">
        Contact List
      </a>
    </li>


  </ul>
</div>



<div class="col-xs-12 m-menu-only">
  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Partner Search
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a href="{!! route('user.favorites') !!}"
              class="nav-link @if($rname=='user.favorites') {{ 'menu_bold_active' }} @endif">
              My Favourites
            </a>
            <a href="{!! route('most_view') !!}"
              class="nav-link @if($rname=='most_view') {{ 'menu_bold_active' }} @endif">
              Most View
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            My mail box
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a href="{!! route('user.inbox') !!}"
              class="nav-link @if($rname=='user.inbox') {{ 'menu_bold_active' }} @endif">
              Receive Message
              @if (\App\Common::message_notification(Auth::user()->id))
              <span class="badge badge-success">{{ \App\Common::message_notification(Auth::user()->id) }}</span>
              @endif
            </a>
            <a href="{!! route('user.sent') !!}"
              class="nav-link @if($rname=='user.sent') {{ 'menu_bold_active' }} @endif">
              Sent Message
            </a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Express interest to me
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a href="{!! route('user.pending_receive_interest') !!}"
              class="nav-link @if($rname=='user.pending_receive_interest') {{ 'menu_bold_active' }} @endif">
              Sent
            </a>
            <a href="{!! route('user.accepted_receive_interest') !!}"
              class="nav-link @if($rname=='user.accepted_receive_interest') {{ 'menu_bold_active' }} @endif">
              Accepted
            </a>
            <a href="{!! route('user.ignore_receive_interest') !!}"
              class="nav-link @if($rname=='user.ignore_receive_interest') {{ 'menu_bold_active' }} @endif">
              Ignore
            </a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Express interest by me
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a href="{!! route('user.pending_sent_interest') !!}"
              class="nav-link @if($rname=='user.pending_sent_interest') {{ 'menu_bold_active' }} @endif">
              Sent
            </a>
            <a href="{!! route('user.accepted_sent_interest') !!}"
              class="nav-link @if($rname=='user.accepted_sent_interest') {{ 'menu_bold_active' }} @endif">
              Accepted
            </a>
            <a href="{!! route('user.ignore_sent_interest') !!}"
              class="nav-link @if($rname=='user.ignore_sent_interest') {{ 'menu_bold_active' }} @endif">
              Ignore
            </a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Package
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a href="{!! route('user.quote') !!}"
              class="nav-link @if($rname=='user.quote') {{ 'menu_bold_active' }} @endif">Package
              Status
            </a>
            <a href="{!! route('user.purchaseHistory') !!}"
              class="nav-link @if($rname=='user.purchaseHistory') {{ 'menu_bold_active' }} @endif">Purchase Invoice
            </a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            My profile and account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a href="{!! route('users.privacy') !!}"
              class="nav-link @if($rname=='users.privacy') {{ 'menu_bold_active' }} @endif">
              Privacy Settings
            </a>
            <a href="{!! route('users.photos.index') !!}"
              class="nav-link @if($rname=='users.photos.index') {{ 'menu_bold_active' }} @endif">
              My Photos
            </a>
            <a href="{!! route('users.documents') !!}"
              class="nav-link @if($rname=='users.documents') {{ 'menu_bold_active' }} @endif">
              My Documents
            </a>
            <a href="{!! route('users.password.edit') !!}"
              class="nav-link @if($rname=='users.mchangePassword') {{ 'menu_bold_active' }} @endif">Change Password
            </a>
            <a href="{!! route('user.contact_list') !!}"
              class="nav-link @if($rname=='user.contact_list') {{ 'menu_bold_active' }} @endif">
              Contact List
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>