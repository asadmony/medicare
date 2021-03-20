<form method="post" class="form-user-setting" action="{{route('user.settingPersonalActivitiesPost')}}">
	{{csrf_field()}}

	<div class="row">
		<div class="col-sm-12">
			<div class="box box-default">
				<div class="box-body">

					<div class="form-group ">
						<label for="favourite_dresses">My Favourite Dress </label>

						{{-- ID: 20   my dress --}}

						<div class="row">
							@foreach ($userSettingFields[19]->values->chunk($userSettingFields[19]->values->count()/3) as $value3)
							<div class="col-sm-4">


								@foreach($value3 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_dresses[]" value="{{ $value->title }}" 
										 
										@if ($me->personalActivity)
										<?php  
										$arr =  explode(", ",$me->personalActivity->dress_style);
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
							@foreach ($userSettingFields[35]->values->chunk($userSettingFields[35]->values->count()/3) as $value3)
							<div class="col-sm-4">


								@foreach($value3 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_cooking[]" value="{{ $value->title }}"
										@if ($me->personalActivity)
										<?php  
										$arr =  explode(", ",$me->personalActivity->favourite_cooking);
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
							@foreach ($userSettingFields[36]->values->chunk($userSettingFields[36]->values->count()/3) as $value3)
							<div class="col-sm-4">


								@foreach($value3 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_reads[]" value="{{ $value->title }}"

										@if ($me->personalActivity)
										<?php  
										$arr =  explode(", ",$me->personalActivity->favourite_reads);
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
							@foreach ($userSettingFields[37]->values->chunk($userSettingFields[37]->values->count()/3) as $value3)
							<div class="col-sm-4">


								@foreach($value3 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_music[]" value="{{ $value->title }}"

										@if ($me->personalActivity)
										<?php  
										$arr =  explode(", ",$me->personalActivity->favourite_music);
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
							@foreach ($userSettingFields[38]->values->chunk($userSettingFields[38]->values->count()/3) as $value3)
							<div class="col-sm-4">


								@foreach($value3 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="favourite_movies[]" value="{{ $value->title }}"

										@if ($me->personalActivity)
										<?php  
										$arr =  explode(", ",$me->personalActivity->favourite_movies);
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
							@foreach ($userSettingFields[39]->values->chunk($userSettingFields[39]->values->count()/3) as $value3)
							<div class="col-sm-4">


								@foreach($value3 as $value)

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="my_interests[]" value="{{ $value->title }}"

										@if ($me->personalActivity)
										<?php  
										$arr =  explode(", ",$me->personalActivity->interests);
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





	<br>

	<div class="pull-right">
		<button type="submit" class="btn btn-danger">Update</button>
	</div>




</div>
</div>


</form>
