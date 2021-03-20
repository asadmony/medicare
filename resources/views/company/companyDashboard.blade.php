@extends('company.layouts.companyMaster')

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
              <table>
                <tr>
                  <th>All Members</th>
                  <td>:</td>
                  <td>{{ $company->allSubroleCount() }}</td>
                </tr>
                <tr>
                  <th>Assessors</th>
                  <td>:</td>
                  <td>{{ $company->assessorCount() }}</td>
                </tr>
                <tr>
                  <th>Administrators</th>
                  <td>:</td>
                  <td>{{ $company->administratorCount() }}</td>
                </tr>
              </table>
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
                  <th>Taken Packages</th>
                  <td>:</td>
                  <td>{{ $company->takenPackageCount() }}</td>
                </tr>
                <tr>
                  <th>Taken Courses</th>
                  <td>:</td>
                  <td>{{ $company->takenCourseCount() }}</td>
                </tr>
                <tr>
                  <th>Taken Exams</th>
                  <td>:</td>
                  <td>{{ $company->takenExamCount() }}</td>
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
            <span class="info-box-number">Company Settings</span>
            <span class="info-box-text">
              <a href="{{ route('company.companyDetailsUpdate', $company) }}">Edit company details</a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
      {{-- dashboard Card end --}}

      {{-- <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">User Search</h3>

              <div class="card-tools">
                <form action="">
                  
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="q" class="form-control" placeholder="Search ...">
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
            <!-- /.card-header -->
            <div class="card-body p-0">
               
            
            </div>
            <!-- /.card-body -->
              </div>
          <!-- /.card -->
        </div>
      </div> --}}


      <div class="row">

  		<div class="col-sm-3">
  			<!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">{{ $company->title }}</h3>
                <h5 class="widget-user-desc">{{ $company->description }}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset($company->logo()) }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    {{-- <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block --> --}}
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Services</h5>
                      <span class="description-text">
                        {{-- {{ $company->products()->where('status', 'active')->count() }} --}}
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    {{-- <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div> --}}
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>

              <div class="card-footer p-0">
                <ul class="nav flex-column">


                <li class="nav-item">
                    <a href="{{ route('company.companyDetailsUpdate', $company) }}" class="nav-link">
                      Update Company Details
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('company.editUserDetails', $company) }}" class="nav-link">
                      Update User Details
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('company.editUserPassword', $company) }}" class="nav-link">
                      Update Password
                    </a>
                  </li>
                  
                  {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                      Followers <span class="float-right badge bg-danger">842</span>
                    </a>
                  </li> --}}
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
      </div>
      <div class="col-sm-9">
          
          <div class="card">
            
            <div class="card card-widget">
              <div class="card-body">
                <div id="map-canvas" style="width: 100%; height: 400px; border:0;border-radius: 5px;">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-primary">
                        <div class="inner">
                          <h3>{{ $memberCount }}</h3>
          
                          <p>Members</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-primary">
                        <div class="inner">
                          <h3> {{ $assessorCount }}</h3>
                          <p>Assessors</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-primary">
                        <div class="inner">
                          <h3>{{ $administratorCount }}</h3>
                          <p>Administrators</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    @php
                        $allmembers = $company->allmembers();
                    @endphp
                    @include('subrole.modules.dashboardUserInfoCard')
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

