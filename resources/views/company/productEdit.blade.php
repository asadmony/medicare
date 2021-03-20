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
             <i class="fa fa-edit"></i> Update Product(Device) <span class="badge badge-default">Macid: {{ $product->macid }}, Title: {{ $product->title }}</span>
            </h3>
          </div>
          <div class="card-body w3-light-gray pb-0">


            <div class="row">
          <div class="col-sm-12 col-md-10   offset-md-1 col-lg-8 offset-lg-2">























            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-tag text-primary"></i> <span class="badge badge-light">
                  
              Product (Device): Macid: {{ $product->macid }}, Title: {{ $product->title }}

                </span> 
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">


<form method="post" enctype="multipart/form-data" action="{{ route('company.productUpdate', ['company'=>$company,'device'=>$product]) }}">

  @csrf
  
  <div class="form-group">
    <label for="title">Device Name</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Device Name"   value="{{ old('title') ?: $product->title }}"  id="title">
  </div>

  <div class="form-group">
    <label for="title">Device Name (Live)</label>
    <input type="text" class="form-control" placeholder="Live Device Name"  readonly value="{{ $product->title_live }}" >
  </div>

  <div class="form-group">
    <label for="macid">Macid</label>
    <input type="text" readonly class="form-control" placeholder="Enter MacId" value="{{ old('macid') ?: $product->macid }}" id="macid">
  </div>

  <div class="form-group">
    <label for="region">Region</label>
    <input type="text"  name="region" class="form-control" placeholder="Enter region" value="{{ old('region') ?: $product->region }}" id="region">
  </div>

  <div class="form-group">
    <label for="zone">Zone</label>
    <input type="text"  name="zone" class="form-control" placeholder="Enter zone" value="{{ old('zone') ?: $product->zone }}" id="zone">
  </div>

  <div class="form-group">
    <label for="cluster">Cluster</label>
    <input type="text"  name="cluster" class="form-control" placeholder="Enter cluster" value="{{ old('cluster') ?: $product->cluster }}" id="cluster">
  </div>

  <div class="form-group">
    <label for="platenumber">Plate Number</label>
    <input type="text" name="platenumber" class="form-control" placeholder="Enter platenumber"   value="{{ old('platenumber') ?: $product->platenumber }}"  id="platenumber">
  </div>

  <div class="form-group">
    <label for="iccid">Active Sim (CCID)</label>
    <input type="text" name="iccid" class="form-control" placeholder="Enter iccid"   value="{{ old('iccid') ?: $product->iccid }}"  id="iccid">
  </div>

  <div class="form-group">
    <label for="model">Model</label>
    <input type="text" name="model" class="form-control" placeholder="Enter model"   value="{{ old('model') ?: $product->model }}"  id="model">
  </div>

  <div class="form-group">
    <label for="model">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Enter description"   value="{{ old('description') ?: $product->description }}"  id="description">
  </div>

  

  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="force_inactive" type="checkbox" {{ $product->force_inactive ? '' : 'checked'}} > Active
    </label>
  </div>

  


  

{{-- 
<div class="row">
  <div class="col-sm-8">

    <div class="form-group">
    <label for="logo">Device Logo (Square Size)</label>
    <input type="file" name="logo" class="form-control" placeholder="Enter company logo" value="{{ old('logo') ?: $company->logo_name }}" id="logo">
  </div>
    
  </div>

  <div class="col-sm-4">
    
    <div class="widget-user-image">
                <img width="150" class="img-circle elevation-2" src="{{ asset($company->logo()) }}" alt="User Avatar">
              </div>
  </div>
</div>
   --}}


  
  
  
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

