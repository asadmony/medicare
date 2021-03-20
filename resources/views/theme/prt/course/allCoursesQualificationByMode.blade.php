@extends('theme.prt.layouts.prtMaster')

@section('title')
@isset($search)Search | @endisset All {{ Str::ucfirst($mode) }} | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
 
 <section class="p-0 m-0" style="min-height: 300px;background: #ddd;">

    <div class="container">
        
    @include('theme.prt.course.courseQualificationsAll')

    <div class="row justify-center">
      <div class="col">
         {{$courses->render()}}
      </div>
    </div>
 
    </div>
     
 </section>
@endsection

@push('js')
@endpush