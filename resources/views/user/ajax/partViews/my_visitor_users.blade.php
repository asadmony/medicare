<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> My Visitors</h3>
    </div>

    <?php
    	$type = 'visitor';
    	$users = Auth::user()->myRelatedUsers($type);
    ?>



            	@include('user.ajax.myRelatedUsers') 

  </div>