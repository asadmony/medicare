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
             <i class="fa fa-edit"></i> Update Package Information <span class="badge badge-default">{{ $package->title }}</span>
            </h3>
          </div>
          <div class="card-body w3-light-gray pb-0">


            <div class="row">
          <div class="col-sm-12 col-md-10   offset-md-1 col-lg-8 offset-lg-2">



                     




 


            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                  
              Package Information  {{ $package->title }}

                </span> 
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">


<form method="post" enctype="multipart/form-data" action="{{ route('admin.updatePackagePost',$package) }}">

  @csrf
  
  <div class="form-group">
    <label for="Title">Package Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title"   value="{{ old('title') ?: $package->title }}"  id="title">
  </div>

  <div class="form-group">
    <label for="Description">Package Description</label>
    <input type="text"  name="description" class="form-control" placeholder="Enter Description"   value="{{ old('description') ?: $package->description }}"  id="description">
  </div>
 
   <div class="form-group">
    <label for="no_of_courses">Number of Courses</label>
    <input type="number" step="1" name="no_of_courses" class="form-control" placeholder="Number of Courses" value="{{ old('no_of_courses') ?: $package->no_of_courses }}" id="no_of_courses">
  </div>

  <div class="form-group">
    <label for="no_of_persons">Number of Persons</label>
    <input type="number" step="1" name="no_of_persons" class="form-control" placeholder="Number of Persons" value="{{ old('no_of_persons') ?: $package->no_of_persons }}" id="no_of_persons">
  </div>

 
  <div class="form-group">
    <label for="no_of_attempts">Maximum number of Attempts (Exams)</label>
    <input type="number" step="1" name="no_of_attempts" class="form-control" placeholder="Number of Attempts" value="{{ old('no_of_attempts') ?: $package->no_of_attempts }}" id="no_of_attempts">
  </div>

  {{-- <div class="form-group">
  <label for="attempt_duration">Attempt Duration (Days)</label>
  <input type="number" step="1" name="attempt_duration" class="form-control" placeholder="Minimum 7 Days" value="{{ old('attempt_duration') ?: $package->attempt_duration }}" id="attempt_duration">
</div> --}}

 <div class="form-group">
  <label for="course_level">Course Level (For selecting courses)</label>
  <select class="select2 form-control" name="course_levels[]" id="course_level" multiple="multiple" data-placeholder="Select Multiple" style="width: 100%;">
 
    @if ($package->course_level)
    <?php $cls = explode(',', $package->course_level); ?>
    @foreach($cls as $cl)
      <option selected value="{{ $cl }}">{{ $cl }}</option>
    @endforeach
    @else
    <option value="" >Course Level</option>
    @endif
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
 
  </select>
</div>


<div class="form-group">
    <label for="duration">Package Duration (Days)</label>
    <input type="number" step="1" name="duration" class="form-control" name="duration" placeholder="Number of Days" value="{{ old('duration') ?: $package->duration }}" id="duration">
  </div>




<div class="form-group">
  <label for="no_of_credits">Number of Credit </label>
  <input type="number" min="0" step="1" name="no_of_credits" class="form-control" placeholder="Minimum 1" value="{{ old('no_of_credits') ?: $package->no_of_credits }}" id="no_of_credits">
</div>

<div class="form-group">
  <label for="price">Price (£) </label>
  <input type="number" min="0" step="any" name="price" class="form-control" placeholder="Minimum 1" value="{{ old('price') ?: $package->price }}" id="price">
</div>

<div class="form-group">
   <select name="package_for" id="package_for" class="form-control"  >
 
  @if ($package->package_for)
      <option selected value="{{ $package->package_for }}">{{ ucfirst($package->package_for) }}</option>
    @else
    <option value="" >Package For</option>
    @endif
    <option value="individual">{{ ucfirst('individual') }}</option>
    <option value="company">{{ ucfirst('company') }}</option>
    {{-- <option value="any">{{ ucfirst('any') }}</option> --}}
   </select>
</div>

<div class="form-group">
  <select name="package_type" id="package_type" class="form-control"  >
  <label for="package_type">Package Type </label>
  @if ($package->package_type)
      <option selected value="{{ $package->package_type }}">{{ ucwords(str_replace('_', ' ',$package->package_type)) }}</option>
    @else
    <option value="" >Package Type</option>
    @endif
    <option value="no_of_courses">{{ ucwords(str_replace('_',' ','no_of_courses')) }}</option>
    <option value="no_of_persons">{{ ucwords(str_replace('_',' ','no_of_persons')) }}</option>
    <option value="no_of_attempts">{{ ucwords(str_replace('_',' ','no_of_attempts')) }}</option>
    <option value="no_of_credits">{{ ucwords(str_replace('_',' ','no_of_credits')) }}</option>
    <option value="any">{{ ucwords('any') }}</option>
   </select>
</div>

  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="status" type="checkbox" {{ $package->status == 'active' ? 'checked' : ''}} > Active
    </label>
  </div>
 
 

<div class="row">
  <div class="col-sm-8">

    <div class="form-group">
    <label for="logo">Package Feature Image (Square Size)</label>
    <input type="file" name="logo" class="form-control" placeholder="Enter logo" value="{{ old('logo') ?: $package->file_name }}" id="logo">
  </div>
    
  </div>
  <div class="col-sm-4">
    
    <div class="widget-user-image">
                <img width="150" class="img-circle elevation-2" src="{{ asset($package->logo()) }}" alt="User Avatar">
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



 <!-- Select2 -->
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $('.select2').select2({theme: 'bootstrap4'});
  });
</script>

{{-- <script>
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
</script> --}}
@endpush

