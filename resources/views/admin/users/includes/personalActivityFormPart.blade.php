<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">
            Personal Activity
        </h3>
    </div>
    <div class="box-body">



    	<div class="box box-default">
				<div class="box-body">

					<div class="form-group ">
						<label for="favourite_dresses">My Favourite Dress </label>

						{{-- ID: 20   my dress --}}

						<div class="row">
							@foreach ($userSettingFields[19]->values->chunk($userSettingFields[19]->values->count()/4) as $value4)
							<div class="col-sm-3">


								@foreach($value4 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_dresses[]" value="{{ $value->title }}" 
										 
										@if ($user->personalActivity)
										<?php  
										$arr =  explode(", ",$user->personalActivity->dress_style);
										?>
										@foreach ($arr as $element)
											{{ ($element == $value->title) ? 'checked' : ''}}
										@endforeach
											
										@endif

										> {{ $value->title }}
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>

								@endforeach
							</div>
							@endforeach
						</div>


					</div>

				</div>
			</div>

			<div class="box box-default">
				<div class="box-body">


					<div class="form-group ">
						<label for="favourite_cooking">Favourite Cooking</label>

						{{-- ID: 36   Favourite cooking --}}
						<div class="row">
							@foreach ($userSettingFields[35]->values->chunk($userSettingFields[35]->values->count()/4) as $value4)
							<div class="col-sm-3">


								@foreach($value4 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_cooking[]" value="{{ $value->title }}"
										@if ($user->personalActivity)
										<?php  
										$arr =  explode(", ",$user->personalActivity->favourite_cooking);
										?>
										@foreach ($arr as $element)
											{{ ($element == $value->title) ? 'checked' : ''}}
										@endforeach
											
										@endif
										> {{ $value->title }}
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>

								@endforeach
							</div>
							@endforeach
						</div>
					</div>


				</div>
			</div>


			<div class="box box-default">
				<div class="box-body">
					<div class="form-group ">
						<label for="favourite_reads">Favourite Reads</label>

						{{-- ID: 37   Favourite Reads --}}
						<div class="row">
							@foreach ($userSettingFields[36]->values->chunk($userSettingFields[36]->values->count()/4) as $value4)
							<div class="col-sm-3">


								@foreach($value4 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_reads[]" value="{{ $value->title }}"

										@if ($user->personalActivity)
										<?php  
										$arr =  explode(", ",$user->personalActivity->favourite_reads);
										?>
										@foreach ($arr as $element)
											{{ ($element == $value->title) ? 'checked' : ''}}
										@endforeach
											
										@endif

										> {{ $value->title }}
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>

								@endforeach
							</div>
							@endforeach
						</div>
					</div>


				</div>
			</div>


			<div class="box box-default">
		<div class="box-body">

			<div class="form-group ">
				<label for="favourite_music">Favourite Music</label>

				{{-- ID: 38   Favourite Music --}}
				<div class="row">
							@foreach ($userSettingFields[37]->values->chunk($userSettingFields[37]->values->count()/4) as $value4)
							<div class="col-sm-3">


								@foreach($value4 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_music[]" value="{{ $value->title }}"

										@if ($user->personalActivity)
										<?php  
										$arr =  explode(", ",$user->personalActivity->favourite_music);
										?>
										@foreach ($arr as $element)
											{{ ($element == $value->title) ? 'checked' : ''}}
										@endforeach
											
										@endif
										> {{ $value->title }}
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>

								@endforeach
							</div>
							@endforeach
						</div>
			</div>


		</div>
	</div>

	<div class="box box-default">
		<div class="box-body">


			<div class="form-group ">
				<label for="favourite_movies">Favourite Movies</label>

				{{-- ID: 39   Favourite Movies --}}
				<div class="row">
							@foreach ($userSettingFields[38]->values->chunk($userSettingFields[38]->values->count()/4) as $value4)
							<div class="col-sm-3">


								@foreach($value4 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_movies[]" value="{{ $value->title }}"

										@if ($user->personalActivity)
										<?php  
										$arr =  explode(", ",$user->personalActivity->favourite_movies);
										?>
										@foreach ($arr as $element)
											{{ ($element == $value->title) ? 'checked' : ''}}
										@endforeach
											
										@endif
										> {{ $value->title }}
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>

								@endforeach
							</div>
							@endforeach
						</div>
			</div>

		</div>
	</div>

	<div class="box box-default">
		<div class="box-body">


			<div class="form-group ">
				<label for="my_interests">My Interests</label>

				{{-- ID: 40   My Interests --}}
				<div class="row">
							@foreach ($userSettingFields[39]->values->chunk($userSettingFields[39]->values->count()/4) as $value4)
							<div class="col-sm-3">


								@foreach($value4 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="my_interests[]" value="{{ $value->title }}"

										@if ($user->personalActivity)
										<?php  
										$arr =  explode(", ",$user->personalActivity->interests);
										?>
										@foreach ($arr as $element)
											{{ ($element == $value->title) ? 'checked' : ''}}
										@endforeach
											
										@endif
										> {{ $value->title }}
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>

								@endforeach
							</div>
							@endforeach
						</div>
			</div>

		</div>
	</div>



	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
			
			                <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="personal_activity_checked"
            @if ($user->personalActivity)
                
            {{$user->personalActivity->checked ? 'checked' : ''}} 

            @endif

            /> Data Checked (Personal Activity)</label>
        </div>
        
        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="personal_activity_can_edit"

            @if ($user->personalActivity)
                
            {{$user->personalActivity->can_edit ? 'checked' : ''}} 

            @endif
            /> Can Edit (Personal Activity)</label>
        </div> 

		</div>
	</div>








    </div>
</div>