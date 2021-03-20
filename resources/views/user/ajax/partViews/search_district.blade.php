<div class="box box-widget mb-0" style="min-height: 600px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Distict Search</h3>
    </div>

    <div class="box-body" style="background: #ddd;">

      <div class="w3-border w3-border-purple w3-round w3-white">
            <div class="w3-container w3-padding">

              <form class="dist-thana-form" action="{{ route('user.userSearchByDistrictAjax') }}" method="post">
                {{csrf_field()}}

                <div class="row">
                  <div class="col-sm-6">
                    
                    <div class="form-group form-group-sm {{ $errors->has('district') ? ' has-error' : '' }}">
            <label for="district">District:</label>
            
            <select class="form-control form-group-sm dist-select"   data-url="{{route('welcome.distSelected')}}" id="district" name="district" >
                <option value="">Select District </option>
                {{-- @if($me->personalInfo)
                  <option selected>{{$me->personalInfo->district}}</option>
                @endif --}}
                @foreach($allDistricts as $dist)
                <option value="{{ $dist->id }}">{{ $dist->name }}</option>
                @endforeach


                
            </select>
            @if ($errors->has('district'))
            <span class="help-block">
                <strong>{{ $errors->first('district') }}</strong>
            </span>
            @endif
            
        </div>


        

                  </div>
                  <div class="col-sm-6">
                    

                    <div class="form-group form-group-sm {{ $errors->has('thana') ? ' has-error' : '' }}">
            <label for="thana">Location/Thana:</label>
            
            <select class="form-control thana-select form-group-sm " id="thana" name="thana">
                <option value="">Select Location/Thana </option>
                {{-- @if($me->personalInfo)
                  <option selected>{{$me->personalInfo->thana}}</option>
                @endif --}}

                @foreach($allUpazilas as $thana)
                <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                @endforeach
                
            </select>
            @if ($errors->has('thana'))
            <span class="help-block">
                <strong>{{ $errors->first('thana') }}</strong>
            </span>
            @endif
            
        </div>


                  </div>
                </div>              


                    



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