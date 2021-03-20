@extends('admin.layouts.adminMaster')

@section('content')
<br>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('alerts')
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <i class="fa fa-plus"></i>
                        Add Topic of Course <span class="badge badge-default"> ID: {{$course->id}},
                            {{$course->title}}</span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-widget mb-0">
                        <div class="card-body w3-gray p-2">
                            <div class="card card-widget mb-0">
                                <div class="card-body">

                                    <form action="{{route('admin.addNewTopicPost',$course)}}"
                                        enctype="multipart/form-data" method="post">

                                        @csrf


                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>Topic Title</b>
                                                <input type="text" name="title" value="{{old('title')}}"
                                                    class="form-control" placeholder="Title of Topic">
                                            </div>
                                            <div class="col-md-4">
                                                <b>Topic Description</b>
                                                <textarea rows="1" placeholder="Topic Description" class="form-control"
                                                    name="description">{{old('description')}}</textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Topic File</b>
                                                <input type="file" name="file_name" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <b>&nbsp;</b>
                                                <button style="margin-top: 20px;" type="submit"
                                                    class="btn  btn-primary ">Submit</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-widget">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <i class="fa fa-th"></i>
                        All Topics of the course <span class="badge badge-default">{{ $course->title}}</span></h3>
                </div>
                @if($courseTopics->count() > 0)
                <div class="card-body w3-gray p-1">


                    @foreach($courseTopics as $topic)
                    <div class="card card-widget form-outer-area  collapsed-card mb-3">

                        <div class="card-header">

                            <h3 class="card-title">

                                {{$loop->iteration}}. Topic Title: {{$topic->title}}, Total Questions: <span
                                    class="item-count-area question-">{{$topic->questions()->count()}}</span>
                            </h3>

                            <div class="card-tools">

                                <a title="Delete" class="w3-btn p-1 px-2 w3-small w3-border"
                                    onclick="return confirm('Do you really want to delete this Topic?');"
                                    href="{{route('admin.deleteTopicCourseQuestionAnswer', ['type'=>'topic', 'id'=>$topic->id])}}"><i
                                        class="fa fa-times w3-text-red"></i></a>

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-1">

                            <div class="px-3 py-1">

                                Topic Description: {!! $topic->description !!}
                                <br>
                                Topic File:

                                @if($topic->file_name)

                                <a href="{{asset('storage/topic/'.$topic->file_name)}}" download><i
                                        class="fa fa-download" aria-hidden="true"></i> Download File</a>
                                @endif


                            </div>



                            <div class="card card-widget mb-0 ">
                                <div class="card-body w3-light-gray p-1">

                                    <div class="card card-widget mb-0 ">
                                        <div class="card-header">
                                            <form class="form-add-item"
                                                action="{{route('admin.addNewTopicQuestion', $topic)}}" method="post">

                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label>New Question</label>
                                                        <input type="text" name="question" {{old('question')}}
                                                            class="form-control" placeholder="Add New Question">
                                                    </div>
                                                    <div class="col-md-1">

                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select class="form-control" name="question_level">
                                                                @if(old('question_level'))
                                                                <option>{{old('question_level')}}</option>
                                                                @endif

                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <br>
                                                            <div class="form-check" style="margin-top: 10px;">
                                                                <input name="active" class="form-check-input"
                                                                    type="checkbox" checked>
                                                                <label class="form-check-label">Active</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">

                                                        <button type="submit" style="margin-top: 23px;"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>

                                                </div>


                                            </form>
                                        </div>
                                        <div class="all-data-area question-area card-body w3-gray p-1 ">

                                            @include('admin.courses.questions.ajax.courseQuestionsAll')


                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>


                    @endforeach



                </div>
                @else
                <h3 class="w3-center w3-text-red">No Topics Yet</h3>
                @endif
            </div>
            {{-- create question papers --}}
            <div class="card-body">
                <div class="card card-widget mb-0">
                    <div class="card-body w3-gray p-2">
                        <div class="card card-info mb-0 bg-blue">
                            <div class="card-body">

                                <form action="{{route('admin.addNewQuestionPapers',$course)}}" method="post">

                                    @csrf


                                    <div class="row justify-content-between">
                                        <div class="col-md-4">
                                            <b>Number of Question Paper</b>
                                            <input type="number" name="questionPaperNumber"
                                                value="{{old('questionPaperNumber')}}" class="form-control"
                                                placeholder="How many questions?">
                                            @error('questionPaperNumber')
                                            <div class="alert alert-danger text-xs">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <b>Number of Questions per paper</b>
                                            <input type="number" placeholder="How many questions per paper?"
                                                class="form-control" name="questionPerPaper"
                                                value="{{old('questionPerPaper')}}">
                                            @error('questionPerPaper')
                                            <div class="alert alert-danger text-xs">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <b>&nbsp;</b>
                                            <button style="margin-top: 20px;" type="submit" class="btn  btn-success ">
                                                <i class="fa fa-copy"></i> Create Question Paper</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-widget">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <i class="fa fa-th"></i>
                        All Question Papers <span class="badge badge-default">{{ $course->title}}</span></h3>
                </div>
                @if($questionPapers->count() > 0)
                <div class="card-body w3-gray p-1">


                    @foreach($questionPapers as $paper)
                    <div class="card card-widget form-outer-area  collapsed-card mb-3">

                        <div class="card-header">

                            <h3 class="card-title">

                                {{$loop->iteration}}. Question set ID {{ $paper->id }} <span
                                    class="bg-blue rounded px-2 mx-2 text-xs">{{$paper->items()->count()}}
                                    Questions</span>
                            </h3>

                            <div class="card-tools">

                                <a title="Delete" class="w3-btn p-1 px-2 w3-small w3-border"
                                    onclick="return confirm('Do you really want to delete this Topic?');"
                                    href="{{ route('admin.deleteQuestionPaper', [$paper->id])}}"><i
                                        class="fa fa-times w3-text-red"></i></a>

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-1">


                            <div class="card card-widget mb-0 ">
                                <div class="card-body w3-light-gray p-1">

                                    <div class="card card-widget mb-0 ">
                                        <div class="card-header">
                                            Question List
                                        </div>
                                        <div class="all-data-area question-area card-body w3-gray p-1 ">

                                            @include('admin.courses.questions.ajax.questionPaperItems')


                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>


                    @endforeach



                </div>
                @else
                <h3 class="w3-center w3-text-red">No Question Papers Yet</h3>
                @endif
            </div>
            {{-- /create question paper --}}

        </div>
    </div>
</section>
@endsection

@push('js')

<script>
    $(function(){

      $(document).on('click', '.item-delete', function(e){

        e.preventDefault();

        var confirmation = confirm("are you sure you want to remove the item?");

        if (confirmation) {



            var that = $( this );
            var url = that.attr("href");

            // alert(url);


            $.ajax({
              url: url,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(response)
              {

                if(response.type == 'answer')
                {
                    that.closest('.answer-area').empty().append(response.page);
                that.closest('.form-outer-area').find('.item-count-area').text(response.item_count);

                }
                if(response.type == 'question')
                {
                    that.closest('.question-area').empty().append(response.page);
                that.closest('.form-outer-area').find('.item-count-area').text(response.item_count);

                }

              },
              error: function(){}
            });


        }


      });

      $(document).on('submit','.form-add-item',function(s){

          s.preventDefault();
          var form = $(this),
      // box = $(this).closest(".box"),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
      // alert(alldata);

      $(".help-block").remove();


      $.ajax({
        url: url,
        type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
    }).done(function(response){

        if(response.success == true)
        {

          form.closest('.form-outer-area').find('.all-data-area').empty().append(response.page);
          form.closest('.form-outer-area').find('.item-count-area').text(response.item_count);
          // $(".d-d").text(response.d);
          // $(".success-js-alert").show();

      }
      else
      {
          $.each( response.errors, function( key, value ) {
            $("[name~='"+key+"']").after( "<span class='help-block text-red'><strong>"+value+"</strong></span>" );
        });

        //   if(response.sessionError){
        //     swal({
        //         text: response.sessionError,
        //         title: "Opps!",
        //         timer: 8000,
        //         type: "error",
        //         showConfirmButton: true,
        //         confirmButtonText: "Close",
        //         confirmButtonColor: "#ff0000"
        //     });
        // }
    }

}).fail(function(){
    alert('error');
});
});
  });
</script>
@endpush
