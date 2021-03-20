@extends('admin.layouts.adminMaster')

@push('css')

  <!-- cropperjs-->
    <link href="{{asset('assets/cropperjs-master/dist/cropper.min.css')}}" rel='stylesheet' type='text/css'>

<link href="{{asset('css/userProfile.css')}}" rel="stylesheet" />
@endpush

@section('content')
  @include('admin.users.parts.userEdit')
@endsection


@push('js')
<!-- cropperjs -->
 @if (servTru()) 
     <script src="{{asset('assets/cropperjs-master/dist/cropper.js')}}"></script>
 @endif

<script src="{{asset('js/userProfile.min.js')}}"></script>
<script>
  $(document).ready(function () {
  $('.select2').select2({});
});

  $(document).ready(function(){
    $(document).on('change', '.change-with-other', function(e){
      // e.preventDefault();
      // alert('ok');      
      var that = $(this);
      var val = that.val();
      if((val == 'Other') || (val == 'Others'))
      {
        that.closest('.other-area').find('.other-value-field').slideDown();
      }
      else
      {
        that.closest('.other-area').find('.other-value-field').slideUp();
      }
    });   
  });
</script>

<script>
  $(document).ready(function() {
  $(document).on("change", ".div-select", function(e){
    // e.preventDefault();

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
            text: 'Location/Thana'
          }));

          $.each(response.datas, function (i, item) {
              // $('.dist-select').append($('<option>', { 
              //     value: item.id,
              //     text : item.name 
              // }));
              $(".dist-select").append("<option value='"+ item.id +"'>"+ item.name +"</option>");
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
    // e.preventDefault();

    var that = $( this );
    var q = that.val();
    var url = that.attr("data-url");
    var urls = url+'?q='+q;
    $(".dist").val(q);



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
            text: 'Location/Thana'
          }));

          $.each(response.datas, function (i, item) {
              // $('.thana-select').append($('<option>', { 
              //     value: item.id,
              //     text : item.name 
              // }));

              $(".thana-select").append("<option value='"+ item.id +"'>"+ item.name +"</option>");
          });
        }
      },
      error: function(){}
    });
  });


  });


  $(document).ready(function() {
  $(document).on("change", ".thana-select", function(e){
    // e.preventDefault();

    var that = $( this );
    var q = that.val();
    $(".tha").val(q);

    // alert(q);
    
    
  });


  });


</script>


@endpush

