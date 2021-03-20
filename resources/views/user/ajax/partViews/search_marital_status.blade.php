<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Marital Status Search</h3>
    </div>

    <div class="box-body" style="background: #ddd;">

      <div class="w3-border w3-border-purple w3-round w3-white">
            <div class="w3-container w3-padding">

              <form class="cat-subcat-form" action="{{ route('user.userSearchByMaritalStatusAjax') }}" method="post">
                {{csrf_field()}}


                <div class="form-group ">
                        <label for="professions">Select Marital Status </label>

                        {{-- ID: 4  Religion --}}

                        <div class="form-group form-group-sm {{ $errors->has('marital_status') ? ' has-error' : '' }}">
            <label for="marital_status">Marital Status:</label>
            
            <select class="form-control form-group-sm form-check-input-select"    id="marital_status" name="marital_status" >
                <option value="">Select Marital Status </option>
                
                @foreach($userSettingFields[10]->values as $value)
                <option>{{ $value->title }}</option>
                @endforeach


                
            </select>
            @if ($errors->has('marital_status'))
            <span class="help-block">
                <strong>{{ $errors->first('marital_status') }}</strong>
            </span>
            @endif
            
        </div>


                    </div>



              </form>



            </div>
          </div>

      <div class="search-term-container">

      </div>

    </div>

 

  </div>