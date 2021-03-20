@extends('subrole.layouts.subRoleMaster')

@push('css')
@endpush

@section('content')
<section class="content">

    <br>
  	<div class="row">
      {{-- dashboard Cart start --}}
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              @if ($subrole->title == 'member')
              <table>
                <tr>
                  <th>Taken Package</th>
                  <td>:</td>
                  <td>{{ $subrole->takenPackagesCount() }}</td>
                </tr>
                <tr>
                  <th>Taken Courses</th>
                  <td>:</td>
                  <td>{{ $subrole->takenCoursesCount() }}</td>
                </tr>
                <tr>
                  <th>Taken Exams</th>
                  <td>:</td>
                  <td>{{ $subrole->takenCourseAttemptsCount() }}</td>
                </tr>
              </table>
              @else
              <table>
                <tr>
                  <th>Company Members</th>
                  <td>:</td>
                  <td>{{ $subrole->company->allSubroleCount() }}</td>
                </tr>
                <tr>
                  <th>Company Assessors</th>
                  <td>:</td>
                  <td>{{ $subrole->company->assessorCount() }}</td>
                </tr>
                <tr>
                  <th>Company Administrators</th>
                  <td>:</td>
                  <td>{{ $subrole->company->administratorCount() }}</td>
                </tr>
              </table>
              @endif
            </span>
            {{-- <span class="info-box-number">  </span> --}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-briefcase"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              <table>
                <tr>
                  <th>Company Taken Packages</th>
                  <td>:</td>
                  <td>{{ $subrole->company->takenPackageCount() }}</td>
                </tr>
                <tr>
                  <th>Company Taken Courses</th>
                  <td>:</td>
                  <td>{{ $subrole->company->takenCourseCount() }}</td>
                </tr>
                <tr>
                  <th>Company Taken Exams</th>
                  <td>:</td>
                  <td>{{ $subrole->company->takenExamCount() }}</td>
                </tr>
              </table>
            </span>
            {{-- <span class="info-box-number">coming soon</span> --}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-number">{{ ucfirst($subrole->title) }} Settings</span>
            <span class="info-box-text">
              <a href="{{ route('subrole.editUserDetails', $subrole) }}">Edit {{ ucfirst($subrole->title) }} details</a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
      {{-- dashboard Card end --}}


@if ($subrole->title == 'assessor' || $subrole->title == 'administrator')
<div class="row mb-2">
  <div class="col-md-12">
    <div class="card card-primary card-outline mb-2">
      <div class="card-header">
        <h3 class="card-title">User Search</h3>
        <div class="card-tools">
        <form action="" >
          <div class="input-group input-group-sm" style="width: 250px;">
            <input
            data-url="{{ route('subrole.memberSearchAjax', $subrole) }}"
             type="text" name="q" class="form-control ajax-data-search" placeholder="Search user">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          </form>
        </div>
        <!-- /.card-tools -->
      </div>

        </div>
    <!-- /.card -->
  </div>
</div>
@endif


    <div class="row">

        
    <div class="col">
        
        <div class="card">
          
          <div class="card card-widget">
            <div class="card-body">
              <div id="map-canvas" style="width: 100%; height: 400px; border:0;border-radius: 5px;">
                @if ($subrole->title == 'assessor' || $subrole->title == 'administrator' )
                <div class="row ajax-data-container">
                  @include('subrole.modules.dashboardUserInfoCard')
                </div>
                @else
                    
                @endif
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



{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_KEY')}}&callback=initMap&libraries=&v=weekly" defer></script> --}}

 <script>

 </script>


@endpush