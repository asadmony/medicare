@extends('theme.prt.layouts.prtMaster')

@section('title')
Registration | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
 
 <section class="p-0 m-0" style="min-height: 300px;background: #ddd;">

    <div class="container">
        

<br> <br>  
    <div class="row">
        <div class="col-sm-6">

<div class="w3-card-4 w3-round-large">
    
            <section class="call-to-action call-to-action-primary button-centered mb-5">
                                        <div class="col-12">
                                            <div class="call-to-action-content">
                                                <h3>Register as individual.</h3>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="call-to-action-btn">
                                                <a href="{{route('register')}}" class="btn btn-modern text-2 btn-light border-0">Start Now</a>
                                            </div>
                                        </div>
                                    </section>
</div>
            
        </div>
        <div class="col-sm-6">
            
            <div class="w3-card-4 w3-round-large">
                
            <section class="call-to-action call-to-action-quaternary button-centered mb-5 w3-deep-orange">
                                        <div class="col-12">
                                            <div class="call-to-action-content">
                                                <h3>Register as Business/Company </h3>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="call-to-action-btn">
                                                <a href="{{route('registerBusiness')}}" class="btn btn-modern text-2 btn-light">Start Now</a>
                                            </div>
                                        </div>
                                    </section>
            </div>

            </div>
        </div>
    </div>
     
 </section>
@endsection

@push('js')
@endpush