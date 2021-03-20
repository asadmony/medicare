@extends('blog.layouts.blogMaster')



@push('meta')


<title>
  @if ($blogParameter->title)
  {!! $blogParameter->title !!}
  @else
  {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in Bangladesh | 
  Matchmaker Service in Bangladesh
  @endif
</title>

<meta name="description" 
    content="{{ $websiteParameter->meta_description ?: 'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh Looing for Marriage Media In Bangladesh? Taslima marriage media is the trustworthy media in Dhaka, Bangladesh. We offer you the best matched life parner according to your profile. Create a free account and search your partner.' }}">

<meta name="keywords" content="{{ $websiteParameter->meta_keyword ?: 'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh' }}">

@endpush


@push('css') 


@endpush

@section('content')
@include('blog.parts.postDivision')
@endsection


@push('js')

<script>
	$(document).ready(function() {
  $(document).on("change", ".div-select", function(e){
    e.preventDefault();

    var that = $( this );
    var q = that.val();
    var url = that.attr("data-url");
    var urls = url+'?q='+q;

    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
       	if(response.success)
       	{
       		$(".dist-select").empty().append($('<option>',{
       			value: '',
       			text: 'District'
       		}));

       		$(".thana-select").empty().append($('<option>',{
       			value: '',
       			text: 'Thana'
       		}));

       		$.each(response.datas, function (i, item) {
					    $('.dist-select').append($('<option>', { 
					        value: item.id,
					        text : item.name 
					    }));
					});
       	}
      },
      error: function(){}
    });
  });
	});
</script>

<script>
	$(document).ready(function() {
  $(document).on("change", ".dist-select", function(e){
    e.preventDefault();

    var that = $( this );
    var q = that.val();
    var url = that.attr("data-url");
    var urls = url+'?q='+q;

    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
       	if(response.success)
       	{
       		$(".thana-select").empty().append($('<option>',{
       			value: '',
       			text: 'Thana'
       		}));

       		$.each(response.datas, function (i, item) {
					    $('.thana-select').append($('<option>', { 
					        value: item.id,
					        text : item.name 
					    }));
					});
       	}
      },
      error: function(){}
    });
  });
	});
</script>
@endpush
