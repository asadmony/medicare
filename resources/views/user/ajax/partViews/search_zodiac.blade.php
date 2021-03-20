<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Zodiac Search</h3>
    </div>

    <div class="box-body" style="background: #ddd;">

    	<div class="w3-border w3-border-purple w3-round w3-white">
						<div class="w3-container w3-padding">




							<form  action="" method="post">
								{{csrf_field()}}


								<div class="form-group  w3-border">

                                        <input type="text" class="form-control input-search-term w3-padding" placeholder="Search Zodiac Sign Name" autofocus data-url="{{ route('user.userSearchByZodiacAjax') }}">

                                        
                                    </div>

							</form>

						</div>
					</div>

     	<div class="search-term-container">
     		


     	</div>

    </div>

 

  </div>