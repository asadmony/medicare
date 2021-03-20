@extends('theme.prt.layouts.prtMaster')

@section('title')
    Face to Face | {{ $course->title }} | {{ env('APP_NAME') }}
@endsection
@push('css')

<style>
 
</style>
@endpush

@section('contents')

@include('alerts.alerts')
<div class="container">
    {{-- <h1>{{ $course->title }}</h1> --}}
        <div class="card card-default">
            <div class="card-body">
                  <div class="row">
                      <div class="col-sm-7">

                        <img src="{{ route('imagecache',['template'=>'cplg', 'filename'=>$course->usliveFi()]) }}" class="img-fluid rounded w-100" alt="img">

                        <h1 class="  font-weight-bold text-6"  >{{$course->title}}</h1>

                  <p>{!! $course->excerpt !!}</p>


                          
                      </div>
                      <div class="col-sm-5">


                     
      <div class="w3-border w3-container w3-border-light-gray rounded">


                            <h3 class="text-primary">Face to Face</h3> 


    <p class=""> 
        No seat available for this course now. Please <a href="{{ route('welcome.page', [2, 'contact-us']) }}">contact us</a> for details. 
    </p>

    


      </div>



                      </div>
                  </div>

                  
            </div>
        </div>
        </div>
</div>


@endsection

@push('js')


@endpush