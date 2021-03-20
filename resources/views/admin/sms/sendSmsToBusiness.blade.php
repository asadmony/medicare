@extends('admin.layouts.adminMaster')

@section('title', 'Admin Dashboard | Lynk')

@section('css')
      <style>
        
      </style>
@endsection

@section('leftSidebar')
@include('admin.layouts.leftSidebar')
@endsection

@section('content')
  @includeIf('admin.sms.parts.sendSmsToBusiness')
@endsection

@push('js')

<script>
	$(document).ready(function(){
		$(document).on('click','.fillup-fields',function(){
	        $(".directory-data").slideToggle('slow', function(){});
	    });


    $('.user-select').select2({
      minimumInputLength: 1,
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.email;
            return obj;
          });
          var data = $.map(data, function (obj) {
            obj.text = obj.text || obj.email;
            return obj;
          });
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
    });




    $('.cat-select').select2({
      minimumInputLength: 1,
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.cat_name;
            return obj;
          });
          var data = $.map(data, function (obj) {
            obj.text = obj.text || obj.cat_name;
            return obj;
          });
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
    });


    $('.thana-select').select2({
      minimumInputLength: 1,
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            cat: $('.cat-select').val(),
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.thana;
            return obj;
          });
          var data = $.map(data, function (obj) {
            obj.text = obj.text || obj.thana;
            return obj;
          });
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
    });

	});


</script>
@endpush
