<form method="post" class="form-user-setting" action="{{route('user.settingEduInfoPost')}}">
    {{csrf_field()}}
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('orgName') ? ' has-danger' : '' }}">
    <label for="orgName" class="w3-text-black text-bold">Organization/Institution Name *</label>
    <input
    type="text"
    id="orgName"
    class=" w3-border w-100 w3-round w3-small px-2" 
    style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
    name="orgName"
    placeholder="Organization Name"
    style="border-radius: 4px;padding-left: 8px;"
    />
    @if($errors->has('orgName'))
    <span class="help-block">
        <strong>{{ $errors->first('orgName') }}</strong>
    </span>
    @endif
</div>
<div class="form-group {{ $errors->has('orgAddress') ? ' has-danger' : '' }}">
    <label for="orgAddress" class="w3-text-black text-bold">Organization/Institution Full Address *</label>
    <input
    type="text"
    id="orgAddress"
    class=" w3-border w-100 w3-round w3-small px-2" 
                        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
    name="orgAddress"
    placeholder="Organization Address"
    style="border-radius: 4px;padding-left: 8px;"
    />
    @if($errors->has('orgAddress'))
    <span class="help-block">
        <strong>{{ $errors->first('orgAddress') }}</strong>
    </span>
    @endif
</div>
<div class="form-group {{ $errors->has('orgType') ? ' has-danger' : '' }}">
        <label for="orgType" class="w3-text-black text-bold">Org / Institution Type *</label>
        <select class="simple-select2 w-100" name="orgType" style="width: 100%;">
            <option></option>
            <option >High School</option>
            <option >College</option>
            <option >University</option>
            <option >Madrasha</option>
            {{-- ID: 28     How Religious Are You? --}}
        </select>
    </div>
<div class="form-group {{ $errors->has('passedDegree') ? ' has-danger' : '' }}">
    <label for="passedDegree" class="w3-text-black text-bold">Passed Degree Ex: MSc in Physics *</label>
    <input
    type="text"
    id="passedDegree"
    class=" w3-border w-100 w3-round w3-small px-2" 
                        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
    name="passedDegree"
    placeholder="Passed Degree"
    style="border-radius: 4px;padding-left: 8px;"
    />
    @if($errors->has('passedDegree'))
    <span class="help-block">
        <strong>{{ $errors->first('passedDegree') }}</strong>
    </span>
    @endif
</div>
<div class="form-group {{ $errors->has('passedDept') ? ' has-danger' : '' }}">
    <label for="passedDept" class="w3-text-black text-bold">Department/Field of Study Ex: Science *</label>
    <input
    type="text"
    id="passedDept"
    class=" w3-border w-100 w3-round w3-small px-2" 
    style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
    name="passedDept"
    placeholder="Field of Study"
    style="border-radius: 4px;padding-left: 8px;"
    />
    @if($errors->has('passedDept'))
    <span class="help-block">
        <strong>{{ $errors->first('passedDept') }}</strong>
    </span>
    @endif
</div>
    </div>
    <div class="col-sm-6">
<div class="form-group {{ $errors->has('passedGrade') ? ' has-danger' : '' }}">
    <label for="passedGrade" class="w3-text-black text-bold">CGPA or Grade (Others will not see your result) Ex: (A) 3.8 out of 5 </label>
    <input
    type="text"
    id="passedGrade"
    class=" w3-border w-100 w3-round w3-small px-2" 
    style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
    name="passedGrade"
    placeholder="CGPA or Grade"
    style="border-radius: 4px;padding-left: 8px;"
    />
    @if($errors->has('passedGrade'))
    <span class="help-block">
        <strong>{{ $errors->first('passedGrade') }}</strong>
    </span>
    @endif
</div>
<div class="form-group {{ $errors->has('yearFrom') ? ' has-danger' : '' }}">
        <label for="yearFrom" class="w3-text-black text-bold">Year From *</label>
        <select class="simple-select2 w-100" name="yearFrom" style="width: 100%;">
            <option value="">Year From</option>
               @for ($i = date('Y'); $i >= date('Y') - 60; $i--)
               <option>{{ $i }}</option>
               @endfor
            {{-- ID: 28     How Religious Are You? --}}
        </select>
    </div>
<div class="form-group {{ $errors->has('yearTo') ? ' has-danger' : '' }}">
        <label for="yearTo" class="w3-text-black text-bold">Year To *</label>
        <select class="simple-select2 w-100" name="yearTo" style="width: 100%;">
           <option value="">Year To</option>
               @for ($i = date('Y'); $i >= date('Y') - 60; $i--)
               <option>{{ $i }}</option>
               @endfor
            {{-- ID: 28     How Religious Are You? --}}
        </select>
    </div>
<div class="form-group {{ $errors->has('passedYear') ? ' has-danger' : '' }}">
        <label for="passedYear"  class="w3-text-black text-bold">Year of Passed *</label>
        <select class="simple-select2 w-100" name="passedYear" style="width: 100%;">
            <option value="">Passed Year</option>
               @for ($i = date('Y'); $i >= date('Y') - 60; $i--)
               <option>{{ $i }}</option>
               @endfor
            {{-- ID: 28     How Religious Are You? --}}
        </select>
    </div>
    <br>
    <div class="">
        <button type="submit" class="btn btn-danger w3-right">Submit</button>
    </div>
    </div>
</div>
</form>