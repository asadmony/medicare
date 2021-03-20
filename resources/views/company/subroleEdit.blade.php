@extends('company.layouts.companyMaster')

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






<form method="post" action="{{ route('company.subroleUpdate', [$company, $subrole]) }}">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
             <i class="fa fa-edit"></i>  Member: {{ $subrole->title }}  of Company: {{ $company->title }} Update
            </h3>
          </div>
          <div class="card-body w3-light-gray pb-0">





            <div class="row">
          <div class="col-sm-6">



                    <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-user"></i> User (Member) Information</h3>
      </div>
      <div class="card-body w3-light-gray pb-0 ">


        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                <div class="card card-widget">
                    <div class="card-body">
 
                        
{{-- <div class="form-group has-feedback{{ $errors->has('user') ? ' has-error' : '' }}"> --}}
<label for="user"> {{ __('User (Company Member)') }}</label>
<div class="input-group mb-3">
<select id="user" disabled 
name="user"
class="form-control user-select select2-container step2-select select2"
data-placeholder="Mobile or Email"
{{-- data-ajax-url="{{route('home.selectUser')}}" --}}
{{-- data-user-add="{{ route('company.subroleUserAdd',['company'=>$company,'subrole'=>$subrole]) }}" --}}
data-ajax-cache="true"
data-ajax-dataType="json"
data-ajax-delay="200"
style="">
@if($subrole->user)
<option value="{{ $subrole->user_id }}">{{ $subrole->user->emailOrMobile() }}</option>
@endif
</select>
<div class="input-group-append">
    
    {{-- <button class="btn btn-primary" type="button"><i class="fa fa-save"></i></button> --}}

    <a target="_blank" href="{{ route('company.newUserCreate', $company) }}" class="btn btn-default" ><i class="fa fa-user-plus"></i></a>

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
                  
              Role Information

                </span> 
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">



  @csrf
  
  <div class="form-group">
    <label for="title">Role Name</label>
    <select name="title" id="title" class="form-control">
      <option value="member">Member</option>
      <option value="assessor">Assessor</option>
      <option value="administrator">Administrator</option>
    </select>
  </div>
  <div class="form-group" style="display: none" id="assesorLevel" >
    <label for="level">Level</label>
    <select  class="select2 form-control"  multiple="multiple" data-placeholder="Select Multiple"  name="level[]" id="level">
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

  {{-- <div class="form-group">
    <label for="zone">Zone/Area</label>
    <input type="text" name="zone" class="form-control" placeholder="Enter Zone / Area"   value="{{ old('title') ?: $subrole->zone }}"  id="zone">
  </div> --}}

  

  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="status" type="checkbox" {{ $company->status == 'active' ? 'checked' : ''}} > Active
    </label>
  </div>
  

                
              </div>
            </div>
          </div>


          <div class="col-md-6">
            
            {{-- <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Devices of this company</h3>
            </div>

            <div class="card-body p-2">

                            
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th><input type="checkbox" name="all-checked" id="all-checked"> All</th>
                    <th>Zone</th>
                    <th>Name</th>
                    <th>Macid</th>
                  </tr>
                  </thead>

                  <tbody>
                    @foreach($company->products()->where('status', 'active')->orderBy('zone')->get() as $product)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><input type="checkbox" value="{{ $product->id }}" @foreach($subrole->items as $it) {{ $it->product_id == $product->id ? 'checked' : '' }} @endforeach  name="items[]" class="checkboxPrimary3"></td>
                      <td>{{ $product->zone }}</td>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->macid }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              
            </div>
            </div> --}}
            
          </div>
        </div>



          </div>
          <div class="card-footer bg-white">

            <div class="float-right">
              
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
      </div>
</form>
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
      if(response.success)
      {


      }
     
    });





});


   });

  $( document ).ready(function() {
    $('#all-checked').click(function(event) {
      if(this.checked) {
          // Iterate each checkbox
          $('.checkboxPrimary3').each(function() {
              this.checked = true;
          });
      }
      else {
        $('.checkboxPrimary3').each(function() {
              this.checked = false;
          });
      }
    });
  });
  $( document ).ready(function() {
    $(document).on('change', '#title',function () {

      
      if($('#title').val() == 'assessor'){
        $('#assesorLevel').css("display", "block")
        $('.select2').select2({theme: 'bootstrap4'});
      }else{
        $('#assesorLevel').css("display", "none")
      }
    })
  });
</script>
@endpush

