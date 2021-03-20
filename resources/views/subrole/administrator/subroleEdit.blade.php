@extends('subrole.layouts.subRoleMaster')

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        @include('alerts.alerts')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    All Courses
                    Package
                </h3>
            </div>
        </div>
                <form method="post" action="{{ route('administrator.subroleUpdate', [$subrole, $role]) }}">
                    
                    <div class="card card-primary w-100">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-edit"></i>  Member: {{ $role->title }}  of Company: {{ $role->company->title }} Update
                            </h3>
                        </div>
                        <div class="card-body w3-light-gray pb-0">
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    
                                    
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
                                                                    <select id="user"
                                                                    name="user"
                                                                    class="form-control user-select select2-container step2-select select2"
                                                                    {{-- data-placeholder="Mobile or Email"
                                                                    data-ajax-url="{{route('home.selectUser')}}"
                                                                    data-user-add="{{ route('company.subroleUserAdd',['company'=>$role->company,'subrole'=>$role]) }}"
                                                                    data-ajax-cache="true"
                                                                    data-ajax-dataType="json"
                                                                    data-ajax-delay="200" --}}
                                                                    style="">
                                                                    @if($role->user)
                                                                    <option value="{{ $role->user_id }}">{{ $role->user->mobileOrEmail() }}</option>
                                                                    @endif
                                                                </select>
                                                                <div class="input-group-append">
                                                                    
                                                                    {{-- <button class="btn btn-primary" type="button"><i class="fa fa-save"></i></button> --}}
                                                                    
                                                                    <a target="_blank" href="{{ route('administrator.newUserCreate', $subrole) }}" class="btn btn-default" ><i class="fa fa-user-plus"></i></a>
                                                                    
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
                                            <select  class="select2 form-control"  multiple="multiple" data-placeholder="Select Multiple"   name="level[]" id="level">
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
                                                <input class="form-check-input" name="status" type="checkbox" {{ $role->company->status == 'active' ? 'checked' : ''}} > Active
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
@endsection


@push('js')
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $( document ).ready(function() {
    $('.select2').select2({theme: 'bootstrap4'});
    $(document).on('change','#title', function () {
      if($('#title').val() == 'assessor'){
        $('#assesorLevel').css("display", "block");
        $('.select2').select2({theme: 'bootstrap4'});
      }else{
        $('#assesorLevel').css("display", "none")
      }
    })
  });
</script>
@endpush
