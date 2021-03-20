@extends('editor.layouts.editorMaster')
@section('title', 'Dhaka Metro News')

@push('css')
@endpush

@section('content')

  @include('editor.parts.dashboard')

@endsection


@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}
@endpush
