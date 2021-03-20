<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Search Latest Profiles</h3>
    </div>

    <?php
    	$users = Auth::user()->latestProfiles();
    ?>



{{--   @if((!$me->contactInfo) or 
  (!$me->personalInfo) or 
  (!$me->personalActivity) or 
  (!$me->searchTermBasic()))
	@include('user.includes.others.alertMessage')
	@else --}}
	@include('user.ajax.myRelatedUsers')
	{{-- @endif --}}

  </div>