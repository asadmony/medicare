
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<div class="box box-widget">
	<div class="box-header with-border">
		<h3 class="box-title">

			<i class="fa fa-plus"></i> Create New User
			
		</h3>
	</div>
	<div class="box-body">
				<form method="post" enctype="multipart/form-data" action="{{ route('admin.newUserPost') }}">

					{{ csrf_field() }}


			<div class="form-group form-group-sm {{ $errors->has('fullName') ? ' has-error' : '' }}">
                <label for="fullName">Full Name:</label>
                <input

                required

                type="text"  
                class="form-control" 
                id="fullName"
                name="fullName"
                value="{{ old('fullName') }}" 
                placeholder="Full Name" 
                />

                @if ($errors->has('fullName'))
                <span class="help-block">
                    <strong>{{ $errors->first('fullName') }}</strong>
                </span>
                @endif
            </div>


    <div class="form-group form-group-sm {{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">Email:</label>
    <input

    required

    type="email"  
    class="form-control" 
    id="email"
    name="email"
    value="{{ old('email')  }}" 
    placeholder="Email" 
    />

    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>


<div class="form-group form-group-sm {{ $errors->has('mobile') ? ' has-error' : '' }}">
    <label for="mobile">Mobile:</label>
    <input

    required

    type="text"  
    class="form-control" 
    id="mobile"
    name="mobile"
    value="{{ old('mobile')  }}" 
    placeholder="Mobile" 
    />

    @if ($errors->has('mobile'))
    <span class="help-block">
        <strong>{{ $errors->first('mobile') }}</strong>
    </span>
    @endif
</div>

<div class="form-group form-group-sm {{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender">Gender:</label>
            
            <select required class="form-control form-group-sm select2" id="gender" name="gender">
                <option value="">Select Gender </option>
                @if(old('gender'))
                <option selected>{{old('gender')}}</option>
                 
                @endif
                {{-- id:1, title:gender --}}
                @foreach ($userSettingFields[0]->values as $value)
                     
                    <option>{{ $value->title }}</option>
                     
                @endforeach
            </select>
            @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
            @endif
        </div>


        <div class="form-group form-group-sm {{ $errors->has('user_type') ? ' has-error' : '' }}">
            <label for="user_type">User Type ( Offline / Online ):</label>
            
            <select required class="form-control form-group-sm select2" id="user_type" name="user_type">
                <option value="">Select User Type </option>
                @if(old('user_type'))
                <option selected>{{old('user_type')}}</option>
                @endif
                
                    <option value="offline">Offline User</option>
                    <option value="online">Online User</option>
                     
 
            </select>
            @if ($errors->has('user_type'))
            <span class="help-block">
                <strong>{{ $errors->first('user_type') }}</strong>
            </span>
            @endif
        </div>


        <div class="form-group form-group-sm {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
    <label for="date_of_birth">Date of Birth:</label>

    <div class="w3-row">

            <div class="w3-col s4">
                <select required class="form-control" id="day" name="day">

                     
                    <option value="">Day</option>
           
                    @for ($i = 1; $i <= 31; $i++)
                    <option>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="w3-col s4">
                <select required class="form-control" id="month" name="month">

                    
                    <option value="">Month</option>
              
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="w3-col s4"><select required class="form-control" id="year" name="year">

               
               <option value="">Year</option>
              

               @for ($i = date('Y') -14; $i >= date('Y') - 60; $i--)
               <option>{{ $i }}</option>
               @endfor
           </select>
       </div>
       </div>

   
    </div>


    <div class="form-group form-group-sm {{ $errors->has('comment') ? ' has-error' : '' }}">
    <label for="comment">Comment:</label>
    <input
 

    type="text"  
    class="form-control" 
    id="comment"
    name="comment"
    value="{{ old('comment')  }}" 
    placeholder="Comment" 
    />

    @if ($errors->has('comment'))
    <span class="help-block">
        <strong>{{ $errors->first('comment') }}</strong>
    </span>
    @endif
</div>


<div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
    <label for="file">CV / Biodata: File ( Pdf / Image / Ms-Word )</label>
    <input

    required

    style="padding-bottom: 32px;" 
    type="file"  
    class="form-control" 
    id="file"
    name="file"
    value="{{ old('file')  }}" 
    placeholder="CV / Biodata" 
    />

    @if ($errors->has('file'))
    <span class="help-block">
        <strong>{{ $errors->first('file') }}</strong>
    </span>
    @endif
</div>



<button type="submit" class="w3-btn w3-purple w3-round w3-border w3-border-purple w3-left w3-hover-purple "> Submit</button>



			 


			
		</form>
			</div>
		</div>

		
	</div>
</div>