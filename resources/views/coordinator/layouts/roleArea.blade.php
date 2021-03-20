@if(Auth::user()->isAdmin())
<li>
  <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
</li>
@endif

@if(Auth::user()->isBlogAdmin())
<li>
  <a href="{{route('blogAdmin.dashboard')}}"><i class="fa fa-dashboard"></i> Blog Admin Dashboard</a>
</li>
@endif