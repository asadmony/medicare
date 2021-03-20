<div class="box box-widget mb-0 w3-animate-zoom" style="min-height: 600px;">


    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-credit-card"></i> Packages (for Membership)</h3>
        <div class="box-tools pull-right">
        	<a href="" data-url="{{ route('user.myAsset', 'pay_now') }}" class="w3-btn btn-sm w3-round w3-purple   btn-menu-to-container"> <i class="fa fa-credit-card"></i> Upgrade Account / Pay Now</a>
        </div>
    </div>
    <div class="box-body" style=" min-height: 200px;">
 
            @include('welcome.includes.others.tabMembershipPackages')
    </div>         
  </div>