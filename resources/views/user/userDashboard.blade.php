@extends('user.layouts.userMaster')

@push('css')
@endpush

@section('content')
<br>
<div class="row px-2">
    {{-- dashboard Cart start --}}
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fab fa-ethereum"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Current Credit</span>
          <span class="info-box-number"> <i class="fas fa-pound-sign"></i> {{ auth()->user()->credit }} </span>
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
          <span class="info-box-text">Taken Packages</span>
          <span class="info-box-number"> {{ auth()->user()->takenPackage()->where('company_id', null)->count() }} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-graduation-cap"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Taken Courses</span>
          <span class="info-box-number"> {{ auth()->user()->takenCourses()->where('company_id', null)->count() }} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-paste"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Courses Attempts</span>
          <span class="info-box-number"> {{ auth()->user()->totalIndividualAttempts()->count() }} </span>
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
            <span class="info-box-number">Profile settings</span>
            <span class="info-box-text"> <a href="{{ route('user.editUserDetails', auth()->user()) }}"> Edit Profile </a></span>
            <span class="info-box-text"> <a href="{{ route('user.editUserPassword', auth()->user()) }}"> Update password </a></span>
        </div>
        
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h5>My Profile Information <a href="{{ route('user.editUserDetails', auth()->user()) }}"> <i class="fa fa-edit"></i> </a> </h5>
        </div>
        <div class="card-body">
            <div>
                <img src="{{ route('imagecache',['template'=>'ppsm','filename'=>$user->profilePic()]) }}" alt="">
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <td>:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>:</td>
                    <td>{{ $user->mobile }}</td>
                </tr>
            </table>
        </div>
      </div>
  </div>
@endsection