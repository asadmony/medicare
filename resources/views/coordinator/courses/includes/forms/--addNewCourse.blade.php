<form method="post" action="{{ route('admin.updateCoursePost',$course) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-5">

            <div class="card card-widget">
                <div class="card-body">

                    {{--
subject_id
status
course_type
course_achievement
title
description
course_code
course_credit
course_mode
mandatory_unit
entry_requirement
assesments
accreditation
how_to_apply
optional_unit
course_brochure
brochure_ext
image_name
payment_one
payment_one_details
payment_two
duration_two
payment_two_details
payment_three
duration_three
payment_three_details
addedby_id
editedby_id --}}


                    <div class="form-group {{ $errors->has('course_type') ? ' has-error' : '' }}">
                        <label for="course_type">Course Type:</label>

                        <div class="radio">
                            <label><input type="radio" name="course_type" value="Undergraduate"
                                    {{ $course->course_type == 'Undergraduate' ? 'checked' : '' }}>Undergraduate</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="course_type" value="Postgraduate"
                                    {{ $course->course_type == 'Postgraduate' ? 'checked' : '' }}>Postgraduate</label>
                        </div>

                        @if ($errors->has('course_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_type') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- div.form-group --}}




                    <div class="form-group {{ $errors->has('course_achievement') ? ' has-error' : '' }}">
                        <label for="course_achievement">Course Achievement:</label>

                        <div class="radio">
                            <label><input type="radio" name="course_achievement" value="Degree"
                                    {{ $course->course_achievement == 'Degree' ? 'checked' : '' }}>Degree</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="course_achievement" value="Topup Degree"
                                    {{ $course->course_achievement == 'Topup Degree' ? 'checked' : '' }}>Topup
                                Degree</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="course_achievement" value="Award"
                                    {{ $course->course_achievement == 'Award' ? 'checked' : '' }}>Award</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="course_achievement" value="Certificate"
                                    {{ $course->course_achievement == 'Certificate' ? 'checked' : '' }}>Certificate</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="course_achievement" value="Diploma"
                                    {{ $course->course_achievement == 'Diploma' ? 'checked' : '' }}>Diploma</label>
                        </div>

                        @if ($errors->has('course_achievement'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_achievement') }}</strong>
                        </span>
                        @endif
                    </div>

                    {{-- membership packages --}}
                    <div class="form-group {{ $errors->has('packageable') ? ' has-error' : '' }}">
                        <label for="packageable">Membership packageable:</label>
                        <div class="radio">
                            <label><input type="checkbox" name="packageable"
                                    {{ $course->packageable == '1' ? 'checked' : '' }}>packageable</label>
                        </div>
                        @if ($errors->has('packageable'))
                        <span class="help-block">
                            <strong>{{ $errors->first('packageable') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- package end --}}
                    <div class="form-group {{ $errors->has('featured') ? ' has-error' : '' }}">
                        <label for="featured">Featured:</label>
                        <div class="radio">
                            <label><input type="checkbox" name="featured"
                                    {{ $course->featured == '1' ? 'checked' : '' }}>featured</label>
                        </div>
                        @if ($errors->has('featured'))
                        <span class="help-block">
                            <strong>{{ $errors->first('featured') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- div.form-group --}}

                    <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject">Select subject:</label>

                        <select name="subject" id="subject" class="form-control" required>
                            @if ($course->subject_id)
                            <option selected value="{{ $course->subject_id }}">
                                {{ $course->subject ? $course->subject->title : ''}}</option>
                            @else
                            <option value="">Select Subject</option>
                            @endif
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- div.form-group --}}

                    {{-- course level --}}
                    <div class="form-group {{ $errors->has('course_level') ? ' has-error' : '' }}">
                        <label for="course_level">Select Course Level:</label>

                        <select name="course_level" id="course_level" class="form-control" required>
                            @if ($course->course_level)
                            <option selected value="{{ $course->course_level }}">
                                {{ $course->course_level== '1'? 'Course' : 'Qualification' }}</option>
                            @else
                            <option value="">Course Level</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>


                            {{-- @foreach($subjects as $subject)
		<option value="{{ $subject->id }}">{{ $subject->title }}</option>
                            @endforeach --}}
                        </select>

                        @if ($errors->has('course_level'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_level') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- course level --}}
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Course Title:</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title') ?: $course->title }}" placeholder="Title of the course">

                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- div.form-group --}}



                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description:</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Course Description"
                            id="description">{{ old('description') ?: $course->description }}</textarea>

                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif

                    </div>


                    {{-- div.form-group --}}

                    {{-- excerpt --}}
                    <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                        <label for="excerpt">Excerpt:</label>
                        <textarea class="form-control" rows="3" name="excerpt" placeholder="Course excerpt"
                            id="excerpt">{{ old('excerpt') ?: $course->excerpt }}</textarea>

                        @if ($errors->has('excerpt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('excerpt') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- excerpt --}}


                    <div class="form-group form-group-sm {{ $errors->has('course_code') ? ' has-error' : '' }}">
                        <label for="course_code">Course Code:</label>
                        <input type="text" class="form-control" id="course_code" name="course_code"
                            value="{{ old('course_code') ?: $course->course_code }}" placeholder="Course Code">

                        @if ($errors->has('course_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_code') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}



                    <div class="form-group form-group-sm {{ $errors->has('course_credit') ? ' has-error' : '' }}">
                        <label for="course_credit">Course Credit:</label>
                        <input type="integer" class="form-control" id="course_credit" name="course_credit"
                            value="{{ old('course_credit') ?: $course->course_credit }}" placeholder="Course Credit">

                        @if ($errors->has('course_credit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_credit') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}



                    <div class="form-group form-group-sm {{ $errors->has('course_mode') ? ' has-error' : '' }}">
                        <label for="course_mode">Course Mode:</label>
                        <input type="text" class="form-control" id="course_mode" name="course_mode"
                            value="{{ old('course_mode') ?: $course->course_mode }}" placeholder="Course Mode">

                        @if ($errors->has('course_mode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_mode') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}



                    <div class="form-group form-group-sm {{ $errors->has('assesments') ? ' has-error' : '' }}">
                        <label for="assesments">Course Assesments:</label>
                        <input type="text" class="form-control" id="assesments" name="assesments"
                            value="{{ old('assesments') ?: $course->assesments }}" placeholder="Course Assesments">

                        @if ($errors->has('assesments'))
                        <span class="help-block">
                            <strong>{{ $errors->first('assesments') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}





                    <div class="form-group {{ $errors->has('mandatory_unit') ? ' has-error' : '' }}">
                        <label for="mandatory_unit">Mandatory Unit:</label>
                        <textarea class="form-control" rows="3" name="mandatory_unit"
                            placeholder="Course Mandatory Unit"
                            id="mandatory_unit">{{ old('mandatory_unit') ?: $course->mandatory_unit }}</textarea>

                        @if ($errors->has('mandatory_unit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mandatory_unit') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}


                    <div class="form-group {{ $errors->has('optional_unit') ? ' has-error' : '' }}">
                        <label for="optional_unit">Optional Unit:</label>
                        <textarea class="form-control" rows="3" name="optional_unit" placeholder="Course Optional Unit"
                            id="optional_unit">{{ old('optional_unit') ?: $course->optional_unit }}</textarea>

                        @if ($errors->has('optional_unit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('optional_unit') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}


                    <div class="form-group {{ $errors->has('entry_requirement') ? ' has-error' : '' }}">
                        <label for="entry_requirement">Entry Requirement:</label>
                        <textarea class="form-control" rows="3" name="entry_requirement"
                            placeholder="Course Entry Requirement"
                            id="entry_requirement">{{ old('entry_requirement') ?: $course->entry_requirement }}</textarea>

                        @if ($errors->has('entry_requirement'))
                        <span class="help-block">
                            <strong>{{ $errors->first('entry_requirement') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}





                    {{-- <div class="checkcard">
    <label><input type="checkcard"> Remember me</label>
</div> --}}



                </div>
            </div>

        </div>


        <div class="col-sm-5">

            <div class="card card-widget">
                <div class="card-body">


                    <div class="form-group {{ $errors->has('accreditation') ? ' has-error' : '' }}">
                        <label for="accreditation">Accreditaion:</label>
                        <textarea class="form-control" rows="4" name="accreditation" placeholder="Course Accreditaion"
                            id="accreditation">{{ old('accreditation') ?: $course->accreditation }}</textarea>

                        @if ($errors->has('accreditation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('accreditation') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}




                    <div class="form-group {{ $errors->has('how_to_apply') ? ' has-error' : '' }}">
                        <label for="how_to_apply">How to Apply:</label>
                        <textarea class="form-control" rows="4" name="how_to_apply" placeholder="Details about to Apply"
                            id="how_to_apply">{{ old('how_to_apply') ?: $course->how_to_apply }}</textarea>

                        @if ($errors->has('how_to_apply'))
                        <span class="help-block">
                            <strong>{{ $errors->first('how_to_apply') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}




                    <hr>

                    <div class="form-group form-group-sm {{ $errors->has('payment_one') ? ' has-error' : '' }}">
                        <label for="payment_one">Payment One (£):</label>
                        <input type="number" class="form-control" id="payment_one" name="payment_one"
                            value="{{ old('payment_one') ?: $course->payment_one }}" placeholder="Payment One">

                        @if ($errors->has('payment_one'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_one') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}




                    <div class="form-group form-group-sm {{ $errors->has('duration_one') ? ' has-error' : '' }}">
                        <label for="duration_one">Duration One (Months):</label>
                        <input type="number" class="form-control" id="duration_one" name="duration_one"
                            value="{{ old('duration_one') ?: $course->duration_one }}" placeholder="Duration One">

                        @if ($errors->has('duration_one'))
                        <span class="help-block">
                            <strong>{{ $errors->first('duration_one') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}



                    <div class="form-group {{ $errors->has('payment_one_details') ? ' has-error' : '' }}">
                        <label for="payment_one_details">Payment One Details:</label>
                        <textarea class="form-control" rows="4" name="payment_one_details"
                            placeholder="Details about Payment One"
                            id="payment_one_details">{{ old('payment_one_details') ?: $course->payment_one_details }}</textarea>

                        @if ($errors->has('payment_one_details'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_one_details') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}


                    <hr>

                    <div class="form-group form-group-sm {{ $errors->has('payment_two') ? ' has-error' : '' }}">
                        <label for="payment_two">Payment Two (£):</label>
                        <input type="number" class="form-control" id="payment_two" name="payment_two"
                            value="{{ old('payment_two') ?: $course->payment_two }}" placeholder="Payment Two">

                        @if ($errors->has('payment_two'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_two') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}




                    <div class="form-group form-group-sm {{ $errors->has('duration_two') ? ' has-error' : '' }}">
                        <label for="duration_two">Duration Two (Months):</label>
                        <input type="number" class="form-control" id="duration_two" name="duration_two"
                            value="{{ old('duration_two') ?: $course->duration_two }}" placeholder="Duration One">

                        @if ($errors->has('duration_two'))
                        <span class="help-block">
                            <strong>{{ $errors->first('duration_two') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}



                    <div class="form-group {{ $errors->has('payment_two_details') ? ' has-error' : '' }}">
                        <label for="payment_two_details">Payment Two Details:</label>
                        <textarea class="form-control" rows="4" name="payment_two_details"
                            placeholder="Details about Payment Two"
                            id="payment_two_details">{{ old('payment_two_details') ?: $course->payment_two_details }}</textarea>

                        @if ($errors->has('payment_two_details'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_two_details') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}


                    <hr>


                    <div class="form-group form-group-sm {{ $errors->has('payment_three') ? ' has-error' : '' }}">
                        <label for="payment_three">Payment Three (£):</label>
                        <input type="number" class="form-control" id="payment_three" name="payment_three"
                            value="{{ old('payment_three') ?: $course->payment_three }}" placeholder="Payment Three">

                        @if ($errors->has('payment_three'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_three') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}




                    <div class="form-group form-group-sm {{ $errors->has('duration_three') ? ' has-error' : '' }}">
                        <label for="duration_three">Duration Three (Months):</label>
                        <input type="number" class="form-control" id="duration_three" name="duration_three"
                            value="{{ old('duration_three') ?: $course->duration_three }}" placeholder="Duration Three">

                        @if ($errors->has('duration_three'))
                        <span class="help-block">
                            <strong>{{ $errors->first('duration_three') }}</strong>
                        </span>
                        @endif
                    </div> {{-- div.form-group --}}



                    <div class="form-group {{ $errors->has('payment_three_details') ? ' has-error' : '' }}">
                        <label for="payment_three_details">Payment Three Details:</label>
                        <textarea class="form-control" rows="3" name="payment_three_details"
                            placeholder="Details about Payment Three"
                            id="payment_three_details">{{ old('payment_three_details') ?: $course->payment_three_details }}</textarea>

                        @if ($errors->has('payment_three_details'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_three_details') }}</strong>
                        </span>
                        @endif

                    </div>
                    {{-- div.form-group --}}




                </div>
            </div>

        </div>


        <div class="col-sm-2">

            <div class="card card-widget">
                <div class="card-body">

                    <div class="form-group form-group-sm {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                        <label for="feature_image">Feature Image:</label>
                        <input type="file" class="form-control" id="feature_image" name="feature_image"
                            style="padding-bottom: 30px;">

                        @if ($errors->has('feature_image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('feature_image') }}</strong>
                        </span> <br>
                        @endif
                        <span class="help-block">If new image uploaded, old image will be replaced by new image.</span>
                    </div> {{-- div.form-group --}}

                    @if ($course->image_name)
                    <img width="100%" src="{{ asset('storage/course/'.$course->image_name) }}"
                        alt="{{ $course->title }}">
                    @endif


                </div>
            </div>


            <div class="card card-widget">
                <div class="card-body">

                    <div class="form-group form-group-sm {{ $errors->has('course_brochure') ? ' has-error' : '' }}">
                        <label for="course_brochure">Brochure:</label>
                        <input type="file" class="form-control" id="course_brochure" name="course_brochure"
                            style="padding-bottom: 30px;">

                        @if ($errors->has('course_brochure'))
                        <span class="help-block">
                            <strong>{{ $errors->first('course_brochure') }}</strong>
                        </span>
                        @endif
                        <span class="help-block">If new brochure uploaded, old one will be replaced by new brochure.
                            image,pdf or msword file is required.</span>
                    </div> {{-- div.form-group --}}

                    @if ($course->course_brochure)
                    @if ($course->fileIsImage())
                    <img width="40px" src="{{ asset('img/image.png') }}" alt="{{ $course->title }}"> <br>
                    Brochure file is Image

                    @elseif($course->fileIsPdf())
                    <img width="40px" src="{{ asset('img/pdf.png') }}" alt="{{ $course->title }}"> <br>
                    Brochure file is Pdf
                    @elseif($course->fileIsWord())
                    <img width="40px" src="{{ asset('img/word.png') }}" alt="{{ $course->title }}"> <br>
                    Brochure file is Word
                    @endif
                    @endif
                </div>
            </div>

            <div class="card card-widget">
                <div class="card-body">

                    <div class="form-group form-group-sm {{ $errors->has('syllabus_file') ? ' has-error' : '' }}">
                        <label for="syllabus_file">Syllabus:</label>
                        <input type="file" class="form-control" id="syllabus_file" name="syllabus_file"
                            style="padding-bottom: 30px;">

                        @if ($errors->has('syllabus_file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('syllabus_file') }}</strong>
                        </span>
                        @endif
                        <span class="help-block">If new syllabus uploaded, old one will be replaced by new syllabus.
                            image,pdf or msword file is required.</span>
                    </div> {{-- div.form-group --}}

                    @if ($course->syllabus_file)
                    @if ($course->syllIsImage())
                    <img width="40px" src="{{ asset('img/image.png') }}" alt="{{ $course->title }}"> <br>
                    syllabus file is Image

                    @elseif($course->syllIsPdf())
                    <img width="40px" src="{{ asset('img/pdf.png') }}" alt="{{ $course->title }}"> <br>
                    syllabus file is Pdf
                    @elseif($course->syllIsWord())
                    <img width="40px" src="{{ asset('img/word.png') }}" alt="{{ $course->title }}"> <br>
                    syllabus file is Word
                    @endif
                    @endif
                </div>
            </div>



        </div>
    </div>

    <div class="card card-widget mb-2">
        <div class="card-body">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
