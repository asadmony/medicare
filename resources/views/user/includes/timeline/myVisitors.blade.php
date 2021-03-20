<div class="w3-card-2">
  
<div class="box box-widget mb-3 w3-animate-zoom w3-hover-shadow">
	<div class="box-header with-border">
		<h3 class="box-title">
			My Visitors
		</h3>

		<div class="box-tools pull-right">
                <a class="w3-button w3-small w3-round w3-border w3-border-bgred w3-hover-bgred p-1 btn-menu-to-container" data-url="{{ route('user.myAsset', 'my_visitor_users') }}" href="">View All <i class="fa fa-angle-right"></i></a>             
                
              </div>
	</div>
    <div class="box-body w3-light-gray" style="min-height: 200px;">

<div class="row">
@foreach($me->visitors()->paginate(3); as $user)

<div class="col-sm-4">

@include('user.includes.cards.userHoverCard')
</div>


@endforeach

</div>


    </div>
</div>
</div>