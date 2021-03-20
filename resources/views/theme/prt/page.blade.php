@extends('theme.prt.layouts.prtMaster')

@section('title')
 {{ $page->page_title }} | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
@include('alerts.alerts')
<div class="container-fluid">
    @isset($page)
        @foreach ($pageParts as $item)
            @include('theme.prt.include.pageItem')
        @endforeach
    @endisset
</div>
@endsection

@push('js')
@endpush