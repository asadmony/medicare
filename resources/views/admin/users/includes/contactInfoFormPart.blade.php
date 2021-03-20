<div class="box box-widget">
	<div class="box-header with-border">
		<h3 class="box-title">
			Contact Information
		</h3>
	</div>
	<div class="box-body">
		
		<div class="row">
			<div class="col-sm-3">
				



				<div class="form-group form-group-sm {{ $errors->has('present_address') ? ' has-danger' : '' }}">
                    <label for="present_address">Present Address </label>
                    <input  
                    type="text" 
                    id="present_address" 
                    class="form-control  " 
                    name="present_address"
                    value="{{$user->contactInfo ? $user->contactInfo->present_address : ''}}"        
                    placeholder="Present Address" 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('present_address'))

                    <span class="help-block">
                        <strong>{{ $errors->first('present_address') }}</strong>
                    </span>
                    
                    @endif
                </div>


<div class="form-group form-group-sm {{ $errors->has('permanent_address') ? ' has-danger' : '' }}">
    <label for="permanent_address">Permanent Address </label>
    <input  
    type="text" 
    id="permanent_address" 
    class="form-control  " 
    name="permanent_address"
    value="{{$user->contactInfo ? $user->contactInfo->permanent_address : ''}}"        
    placeholder="Permanent Address" 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('permanent_address'))

    <span class="help-block">
        <strong>{{ $errors->first('permanent_address') }}</strong>
    </span>
    
    @endif
</div>


<div class="form-group form-group-sm {{ $errors->has('alternative_email') ? ' has-danger' : '' }}">
                    <label for="alternative_email">Alternative Email </label>
                    <input  
                    type="email" 
                    id="alternative_email" 
                    class="form-control  " 
                    name="alternative_email"
                    value="{{$user->contactInfo ? $user->contactInfo->alternative_email : ''}}"        
                    placeholder="Alternative Email..." 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('alternative_email'))

                    <span class="help-block">
                        <strong>{{ $errors->first('alternative_email') }}</strong>
                    </span>
                    
                    @endif
                </div>




			</div>
			<div class="col-sm-3">



				<div class="form-group form-group-sm {{ $errors->has('alternative_mobile') ? ' has-danger' : '' }}">
                    <label for="alternative_mobile">Alternative Mobile </label>
                    <input  
                    type="text" 
                    id="alternative_mobile" 
                    class="form-control  " 
                    name="alternative_mobile"
                    value="{{$user->contactInfo ? $user->contactInfo->alternative_mobile : ''}}"        
                    placeholder="Alternative Mobile..." 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('alternative_mobile'))

                    <span class="help-block">
                        <strong>{{ $errors->first('alternative_mobile') }}</strong>
                    </span>
                    
                    @endif
                </div>



                <div class="form-group form-group-sm {{ $errors->has('convenient_time_to_call') ? ' has-danger' : '' }}">
                    <label for="convenient_time_to_call">Convenient time to call </label>
                    <input  
                    type="text" 
                    id="convenient_time_to_call" 
                    class="form-control  " 
                    name="convenient_time_to_call"
                    value="{{$user->contactInfo ? $user->contactInfo->convenient_time_to_call : ''}}"        
                    placeholder="9am to 5pm..." 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('convenient_time_to_call'))

                    <span class="help-block">
                        <strong>{{ $errors->first('convenient_time_to_call') }}</strong>
                    </span>
                    
                    @endif
                </div>


                <div class="form-group form-group-sm {{ $errors->has('name_of_contact_person') ? ' has-danger' : '' }}">
                    <label for="name_of_contact_person">Name of Contact Person </label>
                    <input  
                    type="text" 
                    id="name_of_contact_person" 
                    class="form-control  " 
                    name="name_of_contact_person"
                    value="{{$user->contactInfo ? $user->contactInfo->name_of_contact_person : ''}}"        
                    placeholder="Name of Contact Person" 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('name_of_contact_person'))

                    <span class="help-block">
                        <strong>{{ $errors->first('name_of_contact_person') }}</strong>
                    </span>
                    
                    @endif
                </div>


				





			</div>
			<div class="col-sm-3">
				



				<div class="form-group form-group-sm {{ $errors->has('relation_with_contact_person') ? ' has-danger' : '' }}">
                    <label for="relation_with_contact_person">Relation with Contact Person </label>
                    <input  
                    type="text" 
                    id="relation_with_contact_person" 
                    class="form-control  " 
                    name="relation_with_contact_person"
                    value="{{$user->contactInfo ? $user->contactInfo->relation_with_contact_person : ''}}"        
                    placeholder="Relation with Contact Person" 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('relation_with_contact_person'))

                    <span class="help-block">
                        <strong>{{ $errors->first('relation_with_contact_person') }}</strong>
                    </span>
                    
                    @endif
                </div>

                <div class="form-group form-group-sm {{ $errors->has('nid') ? ' has-danger' : '' }}">
                    <label for="nid">NID / Smart Card / Passport Number </label>
                    <input  
                    type="text" 
                    id="nid" 
                    class="form-control  " 
                    name="nid"
                    value="{{$user->contactInfo ? $user->contactInfo->nid : ''}}"        
                    placeholder="NID / Smart Card / Passport Number" 
                    style="border-radius: 4px;padding-left: 8px;" 
                    />
                    @if($errors->has('nid'))

                    <span class="help-block">
                        <strong>{{ $errors->first('nid') }}</strong>
                    </span>
                    
                    @endif
                </div>

                 




                <div class="form-group form-group-sm {{ $errors->has('about_me') ? ' has-danger' : '' }}">
                    <label for="about_me">About Yourself </label>

                    <textarea name="about_me" id="about_me" class="form-control" rows="2" placeholder="Write some information about yourself...">{{$user->contactInfo ? $user->contactInfo->about_me : ''}}</textarea>

                    {{-- <input  
                    type="text" 
                    id="about_me" 
                    class="form-control  " 
                    name="about_me"
                    value=""        
                    placeholder="Write some information about yourself..." 
                    style="border-radius: 4px;padding-left: 8px;" 
                    /> --}}
                    @if($errors->has('about_me'))

                    <span class="help-block">
                        <strong>{{ $errors->first('about_me') }}</strong>
                    </span>
                    
                    @endif
                </div>


                





			</div>
			<div class="col-sm-3">
       

       <div class="form-group form-group-sm {{ $errors->has('about_family') ? ' has-danger' : '' }}">
                    <label for="about_family">About Your Family </label>


                    <textarea name="about_family" id="about_family" class="form-control" rows="5" placeholder="Write some information about your family...">{{$user->contactInfo ? $user->contactInfo->about_family : ''}}</textarea>


                    @if($errors->has('about_family'))

                    <span class="help-block">
                        <strong>{{ $errors->first('about_family') }}</strong>
                    </span>
                    
                    @endif
                </div> 


        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="contact_info_checked"
            @if ($user->contactInfo)
                
            {{$user->contactInfo->checked ? 'checked' : ''}} 

            @endif

            /> Data Checked (Contact Info)</label>
        </div>
        
        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="contact_info_can_edit"

            @if ($user->contactInfo)
                
            {{$user->contactInfo->can_edit ? 'checked' : ''}} 

            @endif
            /> Can Edit (Contact Info)</label>
        </div>        
            </div>
		</div>
	</div>
</div>