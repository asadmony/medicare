 
    <section class="content-header">
      <h1>
        Dashboard
        <small>Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          <div class="panel panel-default" style="min-height: 450px;">

  

 
    <div class="panel-body">
    <h3 class="box-title" style="letter-spacing: 2px;">Update Account Information</h3>

    @include('alerts')
    
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
          <div class="panel-heading w3-purple">Update Account Information</div>
          <div class="panel-body">

            
            
  <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.updateAccount') }}">
    {{ csrf_field() }}

    <br>

    <div class="row">
        <div class="col-sm-6">

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Full Name</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name') ?: Auth::user()->name }}"  >

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Mobile</label>

        <div class="col-md-8">
            <input id="mobile" type="text" class="form-control" placeholder="Mobile" name="mobile" value="{{ old('mobile') ?: Auth::user()->mobile }}" >

            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
        </div>
    </div>
            
        </div>
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') ?: Auth::user()->email }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <label for="username" class="col-md-4 control-label">Username</label>

        <div class="col-md-8">
            <input id="username" type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') ?: Auth::user()->username }}">

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
    </div>


        </div>
    </div>

    <br>

    <br>
    

<div class="pull-right">
    <button type="submit" class="w3-button w3-round w3-hover-green w3-purple w3-small">Update</button>
</div>

            
 
</form>



          </div>
        </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
          <div class="panel-heading w3-purple">Change Password Information</div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.updatePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('oldPassword') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-5 control-label">Old Password</label>

                            <div class="col-md-7">
                                <input id="oldpassword" type="password" class="form-control" name="oldPassword" required autocomplete="off" placeholder="Old Password">

                                @if ($errors->has('oldPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-5 control-label">New Password</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="off" placeholder="New Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-5 control-label">Confirm Password</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Confirm New Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-5">
                                <button type="submit" class="w3-button w3-round w3-purple w3-small w3-hover-green">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>      
        </div>
      </div> 
    </section>