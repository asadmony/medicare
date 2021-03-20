@extends('admin.layouts.adminMaster')

@push('css')

<!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush

@section('content')
  <section class="content">

  	<br>

  	 <div class="row">
      
      <div class="col-sm-12">


@include('alerts.alerts')







        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
             <i class="fa fa-edit"></i> Update Company Details of <span class="badge badge-default">{{ $company->title }}</span>
            </h3>
          </div>
          <div class="card-body w3-light-gray pb-0">


          	<div class="row">
          <div class="col-sm-12 col-md-10   offset-md-1 col-lg-8 offset-lg-2">



          	      	<div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-user"></i> User (Company Owner) Information</h3>
      </div>
      <div class="card-body w3-light-gray pb-0 ">


        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                <div class="card card-widget">
                    <div class="card-body">
 
                        
{{-- <div class="form-group has-feedback{{ $errors->has('user') ? ' has-error' : '' }}"> --}}
<label for="user"> {{ __('User (Company Owner)') }}</label>
<div class="input-group mb-3">
<select id="user"
name="user"
class="form-control user-select select2-container step2-select select2"
data-placeholder="Mobile or Email"
data-ajax-url="{{route('home.selectUser')}}"
data-user-add="{{ route('admin.companyOwnerAdd',['company'=>$company]) }}"
data-ajax-cache="true"
data-ajax-dataType="json"
data-ajax-delay="200"
style="">
@if($company->user)
<option value="{{ $company->user_id }}">{{ $company->user->mobileOrEmail() }}</option>
@endif
</select>
<div class="input-group-append">
    
    {{-- <button class="btn btn-primary" type="button"><i class="fa fa-save"></i></button> --}}

    <a target="_blank" href="{{ route('admin.newUserCreate') }}" class="btn btn-default" ><i class="fa fa-user-plus"></i></a>

</div>
{{-- @if( $errors->has('user') )
<span class="help-block">{{ $errors->first('user') }}</span>
@endif --}}
</div>

                    </div>
                </div>

{{--     <div class="lead-owner-new-container float-left w-100" style="display: none;">
         @include('agent.includes.forms.newUserForm')
    </div>
 --}}

                


            </div>
        </div>


 

</div> 
</div>
























            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                  
              Company Information

                </span> 
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">


<form method="post" enctype="multipart/form-data" action="{{ route('admin.companyUpdate', $company) }}">

	@csrf
	
  <div class="form-group">
    <label for="Title">Company Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title"   value="{{ old('title') ?: $company->title }}"  id="title">
  </div>

  <div class="form-group">
    <label for="Description">Company Description</label>
    <input type="text" name="description" class="form-control" placeholder="Enter Description"   value="{{ old('description') ?: $company->description }}"  id="description">
  </div>

  <div class="form-group">
    <label for="company_code">Company Code</label>
    <input type="text" name="company_code" class="form-control" placeholder="Enter login code"   value="{{ old('company_code') ?: $company->company_code }}"  id="company_code">
  </div>
 
 

  <div class="form-group">
    <label for="mobile">Mobile</label>
    <input type="text" name="mobile" class="form-control" placeholder="Enter company mobile" value="{{ old('mobile') ?: $company->mobile }}" id="mobile">
  </div>

    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter company email" value="{{ old('email') ?: $company->email }}" id="email">
  </div>

  
  <div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" class="form-control" placeholder="Address" id="address" cols="30" rows="2">{!! old('address') ?: $company->address !!}</textarea>
  </div>


  <div class="form-group">
    <label for="zip_code">Zip Code</label>
    <input type="text" name="zip_code" class="form-control" placeholder="Enter company zip code" value="{{ old('zip_code') ?: $company->zip_code }}" id="zip_code">
  </div>


  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" class="form-control" placeholder="Enter city" value="{{ old('city') ?: $company->city }}" id="city">
  </div>


  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" class="form-control" placeholder="Enter company country" value="{{ old('country') ?: $company->country }}" id="country">
  </div>



<div class="row">
	<div class="col-sm-8">

		<div class="form-group">
    <label for="logo">Company Logo (Square Size)</label>
    <input type="file" name="logo" class="form-control" placeholder="Enter company logo" value="{{ old('logo') ?: $company->logo_name }}" id="logo">
  </div>
		
	</div>
	<div class="col-sm-4">
		
		<div class="widget-user-image">
                <img width="150" class="img-circle elevation-2" src="{{ asset($company->logo()) }}" alt="User Avatar">
              </div>
	</div>
</div>
  


  
  
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="status" type="checkbox" {{ $company->status == 'active' ? 'checked' : ''}} > Active
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

                
              </div>
            </div>
          </div>
        </div>



          </div>
      </div>
  </div>
</div>


  
  </section>
@endsection


@push('js')

 <!-- Select2 -->
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
	$(document).ready(function(){



      $('.select2').select2({theme: 'bootstrap4'});

  $('.step2-select').select2({
    theme: 'bootstrap4',
    minimumInputLength: 1,
    ajax: {
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        params.page = params.page || 1;
        // alert(data[0].s);
        var data = $.map(data, function (obj) {
          obj.id = obj.id || obj.id;
          return obj;
        });
        var data = $.map(data, function (obj) {
          obj.text = obj.email;
          return obj;
        });
        return {
          results: data,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
  }).on("select2:select", function (e) {
    var selected_element = $(e.currentTarget);
    var user_id = selected_element.val();

    var url = $(".user-select").attr('data-user-add');

    var urls = url + '?user=' + user_id;

    $.get(urls, function(response)
    {
      
     
    });





});


	 });
</script>
@endpush

