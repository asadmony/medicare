<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Education Search</h3>
    </div>

    <div class="box-body" style="background: #ddd;">

    	<div class="w3-border w3-border-purple w3-round w3-white">
						<div class="w3-container w3-padding">

							<form class="cat-subcat-form" action="{{ route('user.userSearchByEducationAjax') }}" method="post">
								{{csrf_field()}}


                <div class="form-group ">
                        <label for="professions">Select Education Level </label>

                        {{-- ID: 26   my education --}}

                        <div class="row">
                            @foreach ($userSettingFields[25]->values->chunk($userSettingFields[25]->values->count()/3) as $value3)
                            <div class="col-sm-4">


                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="educations[]" value="{{ $value->title }}" 
                                         
                                        

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


                    {{-- <div class="form-group ">
                        <label for="genders">Select Bride Groom </label>


                        <div class="row">
                            @foreach ($userSettingFields[5]->values as $v)
                            <div class="col-sm-4">  

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="genders[]" value="{{ $v->title }}" 
                                         
                                        

                                        > {{ $v->title }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

    
                            </div>
                            @endforeach
                        </div>


                    </div> --}}



							</form>







{{-- 
<form class="cat-subcat-form" action="" method="post">
{{csrf_field()}}
<div class="panel">
<div class=" panel-body" style="background: #eee;">

<h5 style="font-weight: bold;text-transform: uppercase;color:#222;">
<div class="checkbox" style="margin-bottom: -12px;margin-top: -10px;">
<label><input style="margin-top: 1px;" type="checkbox" class="check" name="cats[]" value="5" ><b>Hello cat title</b> </label>
</div>
</h5>



<div class="checkbox" style="margin-bottom: -5px;">
<label><input class="check" style="margin-top: 8px;" type="checkbox" name="subcats[]" value="3" >sub title </label>
</div>


<br>


</div>

</div>
</form> --}}



						</div>
					</div>

     	<div class="search-term-container">

     	</div>

    </div>

 

  </div>