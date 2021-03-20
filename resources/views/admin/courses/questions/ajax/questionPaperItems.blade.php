@foreach($paper->items as $question)
<div class="card card-widget mb-2   form-outer-area ">
    <div class="card-header">
        <h3 class="card-title">
            {{$loop->iteration}}. {{$question->question->question}}
        </h3>

        <div class="card-tools">
        </div>
    </div>
    <div class="card-body w3-light-gray p-2">

        <div class="card card-widget p-1 mb-0">
            <div class="card-header">
                Answer options
            </div>

            <div class="card-body table-responsive w3-light-gray p-2">

                <table class="table table-sm table-bordered ">

                    <tbody class=" all-data-area answer-area w3-white">

                        @include('admin.courses.questions.ajax.questionPaperAnswersAll')
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@endforeach
