<section class="content-header">
<h1>
    User
    <small>Edit</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
    <li class="active">Edit</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<!-- Info boxes -->
<div class="row">
    <div class="col-md-12">
        @include('alerts.alerts')
        @include('alerts.alertSweet')
        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> Edit information of ID:{{ $user->id }}, {{ $user->email }}, {{ $user->username }} 
                    @if($user->isOffline())
                    | <span class="w3-dark-gray w3-round w3-padding w3-large">Offline Profile</span>
                    @endif
                </h3>
                <div class="pull-right">

                </div>
                
            </div>
            <div class="box-body" style="background: #eee;">


                



@include('admin.users.includes.profilePicFormPart')

<div class="row">
    <div class="col-sm-6">
@include('admin.users.includes.publicPhotoUpload')
@include('admin.users.includes.cvUpload')
    </div>
    <div class="col-sm-6">
@include('admin.users.includes.adminConversationWithUser')
    </div>
</div>


<form  role="form" method="post" action="{{route('admin.userDetailsUpdatePost',$user)}}">
                    {{csrf_field()}}

@include('admin.users.includes.basicInfoFormPart') 

@if($user->isOffline())
@else

@include('admin.users.includes.contactInfoFormPart')

@include('admin.users.includes.personalInfoFormPart')

@include('admin.users.includes.personalActivityFormPart')

@include('admin.users.includes.partnerPreferenceFormPart') 

@endif


<div class="box box-widget">
    <div class="box-body">

        <div class="row">
            <div class="col-sm-4">

                <div class="text-center">
            @if($user->isOffline())
                        <br> 
                    <span class="w3-dark-gray w3-round w3-padding w3-large">Offline Profile</span>
                    @endif
        </div>
                
            </div>
            <div class="col-sm-8">

                <div class="pull-right">

         <div class="checkbox">
            <label>
                <input class=""
                type="checkbox"
                name="final_checked"        
                    
                {{$user->final_checked ? 'checked' : ''}} 
                /> Checking Completed and Send SMS</label>
            </div>

        <a class="btn btn-primary" target="_blank" href="{{route('user.userDetailsPrint', $user)}}">Print <i class="fa fa-print"></i></a>

        <button type="submit" class="btn btn-primary">Update</button>              
        </div>
                
            </div>
        </div>

        

        
        
    </div>
</div>



</form>


</div>
</div>

</div>
</div>
<!-- /.row -->


</section>