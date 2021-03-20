@extends('subrole.layouts.subRoleMaster')

@push('css')
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
    }

    #grad1 {
        background-color: : #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA)
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;
        position: relative
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }

    #msform input,
    #msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid skyblue;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }

    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue
    }

    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #000000
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 25%;
        float: left;
        position: relative
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f023"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: skyblue
    }

    .radio-group {
        position: relative;
        margin-bottom: 25px
    }

    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
    }

    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Examination
                    </h3>
                </div>
                <div>

                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                                {{-- @if ($takenCourseExam->takenCourseExamItems->count() > 0)
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <h2><strong>{{ $takenCourse->course->title }}</strong></h2>
                                <p>Select the correct answer and go to next question</p>
                                <div class="row">
                                    <div class="col-md-12 mx-0 ">
                                        <table class="table">
                                            <tr>
                                                <th>Last Attempt Date</th>
                                                <td>:</td>
                                                <td>{{ $takenCourseExam->last_attempt_started_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Score</th>
                                                <td>:</td>
                                                <td>
                                                    @php
                                                    $total = $takenCourseExam->takenCourseExamItems->count();
                                                    $correct =
                                                    $takenCourseExam->takenCourseExamItems()->where('correct',
                                                    1)->get()->count();
                                                    $result = round($correct/$total*100, 2);
                                                    @endphp
                                                    {{ $result }}%
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($result >= config('parameter.pass_score'))
                                                    <span class="text-green">Passed</span>
                                                    @elseif($result <= config('parameter.fail_score')) <span
                                                        class="text-red">Failed</span>
                                                        @else
                                                        <span class="text-blue">Resubmit</span>
                                                        @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else --}}

                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <h2><strong>{{ $takenCourse->course->title }}</strong></h2>
                                <p>Select the correct answer and go to next question</p>
                                <div class="row">
                                    <div class="col-md-12 mx-0">
                                        <form id="msform" method="POST"
                                            action="{{ route('subrole.submitAttemptCourseExam', [$subrole, $takenCourseExam ]) }}">
                                            @csrf
                                            <!-- progressbar -->
                                            <div class="progress progress-xxs">
                                                <div class="progress-bar progress-bar-danger progress-bar-striped"
                                                    role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                    id="qprogressbar" aria-valuemax="100" style="width: 0%">
                                                    <span class="sr-only">60% Complete (warning)</span>
                                                </div>
                                            </div>
                                            <fieldset>
                                                <div class="form-card">
                                                    <div class="text-blue">
                                                        This test has {{ $questionPaper->items->count() }}
                                                        questions. Please make sure you have enough time.
                                                    </div>
                                                </div>
                                                <input type="button" name="next" class="next action-button"
                                                    value="Enroll" />
                                            </fieldset>
                                            @foreach ($questionPaper->items as $item)
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title pb-2">{{ $loop->iteration }}.
                                                        {{ $item->question->question }}
                                                    </h2>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <input class="w-auto" type="radio"
                                                                name="question_{{ $item->question->id }}" value=""
                                                                checked hidden>
                                                        </li>
                                                        @foreach ($item->question->answers as $ans)
                                                        <li>
                                                            <input class="w-auto" type="radio"
                                                                id="answer_{{ $ans->id }}"
                                                                name="question_{{ $item->question->id }}"
                                                                value="{{ $ans->id }}">
                                                            <label
                                                                for="answer_{{ $ans->id }}">{{ $ans->answer }}</label>
                                                        </li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                                @if ($loop->iteration > 1)
                                                <input type="button" name="previous"
                                                    onclick="removeprogress({{ $questionPaper->items->count() }})"
                                                    class="previous action-button-previous" value="Previous" />
                                                @endif
                                                <input type="button"
                                                    onclick="addprogress({{ $questionPaper->items->count() }})"
                                                    name="next" class="next action-button" value="Next Step" />
                                            </fieldset>
                                            @endforeach
                                            <fieldset>
                                                <div class="form-card text-center">
                                                    <button class="btn btn-success" type="submit">Submit Answer
                                                        Script</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script>

    </script>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){
current_fs = $(this).parent();
next_fs = $(this).parent().next();
//Add Class Active
// $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

});

var progressStatus = 0;
function addprogress(val) {
    let prog = parseInt(100/val);
    progressStatus = progressStatus + prog;
    $("#qprogressbar").css("width", progressStatus+'%');
}
function removeprogress(val) {
    let prog = parseInt(100/val);
    progressStatus = progressStatus - prog;
    $("#qprogressbar").css("width", progressStatus+'%');
}
// function submitanswer(params) {
//         console.log('a');
//     $('#msform').on("submit", function (e) {
//         var dataString = $(this).serialize();
//         console.log(dataString);
//         axios.post('')
//     e.preventDefault()
//     });
// }
//
</script>
@endpush
