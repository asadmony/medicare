@extends('admin.layouts.adminMaster')

@push('css')

<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
<link rel="stylesheet" type="text/css" href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css') }}">



  <link href="{{ asset('assets/sn/dist/summernote.css') }}" rel="stylesheet">
@endpush

@section('content')

  @include('admin.pages.parts.newPage')

@endsection


@push('js')


<script type="text/javascript" src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js')}}"></script>
<script type="text/javascript" src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js')}}"></script>
<script type="text/javascript" src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js')}}"></script>

<script src="{{ asset('assets/sn/dist/summernote.js') }}"></script>


<script>
	
  $(document).ready(function() {
    $('.details').summernote({
      placeholder: 'Write description of the post here...',
      minHeight: 160,
      codemirror: { // codemirror options
        theme: 'monokai',
        lineNumbers: true,
        lineWrapping: true,
      }
    });
  });

</script>

{{-- <script src="{{asset('cp/bower_components/ckeditor/ckeditor.js')}}"></script> --}}

{{-- <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('content');
  });
</script> --}}
@endpush
