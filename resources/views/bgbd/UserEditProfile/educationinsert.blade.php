@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
<div class="profileSection">
  <div class="container" style="background: #FFF; margin-top: 30px;">
    <div class="row">
      <div class="col-sm-12  m-b-100">        
        <h4 class="center-block margin-0-auto margin-bottom-15 text-align-center padding-top-20">
          Education
        </h4>
        <hr />
        @if(Session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong> {{ Session('error') }}</strong>
        </div>
        <hr>
        @endif
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong> {{ Session('success') }}</strong>
        </div>
        <hr>
        @endif
        
        <table class="table table-bordered table-hover  margin-bottom-40">
          <thead>
            <tr>
              <th>Educaiton Level</th>
              <th>Educaiton Area</th>
              <th>Degree</th>
              <th>Institution</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @isset($education)
            
            @foreach ($education as $item)
            <tr>
              <td>
                {!! educationLevel($item->education_level) !!}
              </td>
              <td>
                {!! $item->education_area !!}
              </td>
              <td>
                {!! $item->degree_name !!}
              </td>
              <td>
                {!! $item->institution_name !!}
              </td>
              <td>
                {!! $item->status == 1 ?'Currently Studying' : 'Completed' !!}
              </td>
              <td>
                <a href="{{ route('users.profile.education.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
                <a href="{{ route('users.profile.education.delete', $item->id) }}"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
            @endforeach
            @endisset
          </tbody>
        </table>
        @isset($allowSkip)
        <a href="{{ route("users.myprofile") }}" class="signupbutton padding-0-30 margin-bottom-15 btn btn-danger pull-right edu-next" style="float: right">
          Back to Profile <span class="fa fa-caret-right"></span></a>
          @endisset
          
          <a href="#" class="signupbutton padding-0-30 margin-bottom-15 btn btn-info pull-right add-more-edu">
            Add More <span class="fa fa-star"></span>
          </a>
          
          
          <form class="padding-0-30 margin-bottom-20 hide-form" method="POST" action="{{ route('users.profile.education.store') }}"
          role="form">
          @csrf
          
          <div class="form-group row">
            
            <div class="col-sm-6">
              <label for="elevel" class="col-form-label">
                @if ($selected > 0 )
                Educational Level*
                @else
                Highest Educational Level*
                @endif
                
              </label>
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                <select name="elevel" id="elevel" class="uk-input" required="required">
                  <option value="0">Select Educational Level</option>
                  @foreach ($educationLevel as $key=>$item)
                  <option {{ ($key == $selected) ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                </button>
                
                @if ($errors->has('elevel'))
                <span class="text-danger" role="alert">
                  <strong>{{ $errors->elevel('elevel') }}</strong>
                </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_elevel"></strong>
                </span>
              </div>
            </div>
            
            <div class="col-sm-6">
              <label for="earea" class="col-form-label">Education Area*
                
              </label>
              <input id="earea" name="earea" placeholder="Education Area" class="uk-input here" required="required"
              type="text">
              @if ($errors->has('earea'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->earea('earea') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_earea"></strong>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="dname" class="col-form-label">Degree Name*
                
              </label>
              <input id="dname" name="dname" placeholder="Degree Name" class="uk-input here" required="required"
              type="text">
              @if ($errors->has('dname'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->dname('dname') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_dname"></strong>
              </span>
            </div>
            
            <div class="col-sm-6">
              <label for="iname" class="col-form-label">Institution Name*
                
              </label>
              <input id="iname" name="iname" placeholder="Institution Name" class="uk-input here"
              required="required" type="text">
              @if ($errors->has('iname'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('iname') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_iname"></strong>
              </span>
            </div>
          </div>
          
          
          
          
          <div class="row form-group completed">
            <div class="col-sm-6">
              <label for="statusstudent" class="col-form-label">Completion Status
              </label>
              <div class="radio statusstudent">
                <label>
                  <input checked type="radio" class="statusstudent" name="statusstudent" value="1">
                  Currently Studying
                </label>
                <label>
                  <input type="radio" class="statusstudent" name="statusstudent" value="2">
                  Completed
                </label>
              </div>
              @if ($errors->has('statusstudent'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('statusstudent') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_statusstudent"></strong>
              </span>
            </div>
            
            <div class="col-sm-6 showsemester" style="display: none">
              <label for="semester" class="col-form-label">Current Year / Semester*
                
              </label>
              <input id="result" name="semester" placeholder="semester" class="uk-input here" type="text">
              @if ($errors->has('semester'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->dname('semester') }}</strong>
              </span>
              @endif
            </div>
          </div>
          
          
          <input type="hidden" value="2" name="statusstudent">
          
          <div class="row">
            <div class="col-sm-12">
              
              <a href="#" type="button" class="signupbutton btn btn-large btn-danger edu-skip" style="float: right">Skip</a>
              <button type="submit" id="submit" class="signupbutton btn btn-large btn-success">
                Save</button>
                
              </div>
              
              
            </form>
            
          </div>
        </div>
      </div>
      </div>
      </div>
      
      
      <script>
        $(document).ready(function() {
          @php
          if(!isset($allowSkip)){
            echo '$(".hide-form").show();';
            echo '$(".add-more-edu").hide();';
          }
          @endphp
          $(".add-more-edu").click(function(event) {
            event.preventDefault();
            $(".hide-form").show();
            $(this).hide();
            $(".edu-next").hide();
          });
          
          $(".edu-skip").click(function(event) {
            event.preventDefault();
            $(".hide-form").hide();
            $(".edu-next, .add-more-edu").show();
          });
        });
        $(function () {
          
          $('.showsemester').hide(100);
          
          
          if ($('.statusstudent:checked').val() == 1) {
            $('.showsemester').show(300);
          }
          if ($('.statusstudent:checked').val() == 2) {
            $('.showsemester').hide(100);
          }
          
          $('.statusstudent').change(function (e) {
            
            if ($(this).is(':checked')) {
              if ($(this).val() == 1) {
                $('.showsemester').show(300);
              }
              if ($(this).val() == 2) {
                $('.showsemester').hide(100);
              }
            }
            
          });
          
          //==================================================================
          $("body").on("click", "#submit", function () {
            var err = 0;                                             // check box
            $("#err_elevel, #err_earea  , #err_dname , #err_iname, #err_statusstudent ,#err_diet  ").text("");
            
            
            var elevel = $("select[name='elevel']").val();
            var earea = $("input[name='earea']").val();
            var dname = $("input[name='dname']").val();
            var iname = $("input[name='iname']").val();
            var statusstudent = $("input[name='statusstudent']").val();
            var hobbies = $("input[name='hobbies']").val();
            
            
            
            if (elevel == "") {
              $("#err_elevel").text("Educational Level Required");
              err++;
            }
            if (earea == "") {
              $("#err_earea").text("Education Area Required");
              err++;
            }
            
            if (dname == "") {
              $("#err_dname").text("Degree Name Required");
              err++;
            }
            if (iname == "") {
              $("#err_iname").text("Institution Name Required");
              err++;
            }
            /* check box
            if (statusstudent == "") {
              $('#err_statusstudent').text("Completion Status  Required");
              err++;
            } */
            if (diet == "") {
              $("#err_diet").text("Diet Type Required");
              err++;
            }
            
            if (err > 0) {
              return false;
            }
            return true;
          });
          
          //==================================================================
          
          
          
          
        });
      </script>
      @endsection
      
      
      @section('noinuse')
      
      <div class="form-group row completed">
        <div class="col-sm-6">
          <label for="result" class="col-form-label">Results*
            
          </label>
          <input id="result" name="result" placeholder="Result" class="uk-input here" required="required" type="text">
          @if ($errors->has('result'))
          <span class="text-danger" role="alert">
            <strong>{{ $errors->dname('result') }}</strong>
          </span>
          @endif
        </div>
        <div class="col-sm-6">
          <label for="ycom" class="col-form-label">Year Completed*
            
          </label>
          <input id="ycom" name="ycom" placeholder="Year Complete" class="uk-input here" required="required" type="text">
          @if ($errors->has('ycom'))
          <span class="text-danger" role="alert">
            <strong>{{ $errors->first('ycom') }}</strong>
          </span>
          @endif
        </div>
      </div>
      @endsection
      