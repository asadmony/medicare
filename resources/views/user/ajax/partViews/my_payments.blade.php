<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-credit-card"></i> My Payment History</h3>
    </div>

    <?php
    	$payments = Auth::user()->myPayments();
    ?>

            	@include('user.ajax.myPayments')

  </div>