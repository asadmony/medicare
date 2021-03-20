@extends('blog.layouts.blogMaster')


@push('meta')


<title> @if($post->meta_title) {!! $post->meta_title !!} @elseif ($blogParameter->title) {!! $blogParameter->title !!} @else {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in Bangladesh | Matchmaker Service in Bangladesh @endif </title>

<meta name="description" @if($post->meta_description) content="{{ $post->meta_description }}" @else content="{{ $websiteParameter->meta_description ?: 'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh Looing for Marriage Media In Bangladesh? Taslima marriage media is the trustworthy media in Dhaka, Bangladesh. We offer you the best matched life parner according to your profile. Create a free account and search your partner.' }}" @endif >

<meta name="keywords" @if($post->meta_keywords) content="{{ $post->meta_keywords }}" @else content="{{ $post->tags }}" @endif >


       <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="{{route('welcome.postDetails',[$post, $post->excerpt])}}" />
  <meta property="og:type"          content="post" />
  <meta property="og:title"         content="{{$post->title}}" />
  <meta property="og:description"   content="{{str_limit($post->excerpt,160)}}" />
  <meta property="og:image"         content="{{asset($post->fi())}}" />

  {{-- <meta name="keywords" content="{{$post->tags}}"> --}}



@endpush

@push('css')


@endpush

@section('content')

@include('blog.parts.postDetails')

@endsection


@push('js')
@endpush
