@extends('company.layouts.companyMaster')

@push('css')

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
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                  
              Company Information

                </span> 
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">


<form method="post" enctype="multipart/form-data" action="{{ route('company.companyDetailsUpdatePost', $company) }}">

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
    <label for="company_code">Company Code / Company Username</label>
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

@endpush

