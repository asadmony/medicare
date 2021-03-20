 

@extends('layouts.app')
@push('css')
<link href="{{ asset('css/loginStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/loginIcons.css') }}" rel="stylesheet">
<link href="{{ asset('css/w3.css') }}" rel="stylesheet">
@endpush
@section('content')
<section class="w3l-form-36">
    <div class="form-36-mian section-gap">
        <div class="wrapper">
   
                            <form action="{{route('registerBusinessPost')}}" method="post">

                <br>

                <div class="row">
                    <div class="col-sm-8">
                        @include('alerts.alerts')

                        <div class="w3-container w3-white w3-padding rounded">




                                @csrf
                                <div class="modal-header text-center">
                                    <h4 class="modal-title " id="formModalLabel">Create New Company</h4>

                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="name">Your Full Name:</label>
                                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}" id="name" required>
                                                @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="email">Your Email address:</label>
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter email" id="email" required>
                                                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                                            </div>



                                            <div class="form-group">
                                                <label for="pwd">Your Password:</label>
                                                <input type="password" class="form-control" 
                                                name="password" placeholder="Enter your password" id="pwd" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pwd">Confirm Password:</label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your  password" id="pwd" required>
                                            </div>

                                            <hr>


                                            <div class="form-group">
                                                <label for="title">Company Name:</label>
                                                <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="company name" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="company_code">Company Code:</label>
                                                <input type="text" name="company_code" value="{{old('company_code')}}" class="form-control" placeholder="Companay code" required/>
                                            </div>


                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                            <label for="name">Company Description:</label>
                                                <textarea type="text" name="description" class="form-control" rows="3" placeholder="description" required >{{old('description')}}</textarea>
                                            </div>

                                            <div class="form-group">
                                            <label for="name">Company Address:</label>
                                                 <textarea type="text" name="address"  rows="3" class="form-control" placeholder="address" required >{{old('address')}}</textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="zip_code">Zip Code:</label>
                                                <input type="text" name="zip_code" value="{{old('zip_code')}}" class="form-control" placeholder="zip code" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">City:</label>
                                                <input type="text" name="city" class="form-control" value="{{old('city')}}" placeholder="City" required/>
                                            </div>


                                            <div class="form-group">
                                                <label for="name">Country:</label>
                                                <input type="text" name="country" value="{{old('country')}}" class="form-control" placeholder="Country name" required/>
                                            </div>




                                        </div>
                                    </div>




                                     

                                     
                                     
                            </div>
                            <div class="modal-footer">

                                <a href="{{url('/')}}">Home</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
             
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>
</div>
</section>
@endsection
