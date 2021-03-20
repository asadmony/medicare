@if(!isset($allmembers))
    @php
        $allmembers = $subrole->company->allmembers();
    @endphp
@endif
@foreach ( $allmembers as $member)
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box 
                    @if(isset($subrole))
                    @if($member->memberTakenCourseIfAnyByAssessor($subrole))
                      @if($member->memberTakenCourseWarningIfAnyByAssessor($subrole))
                      w3-yellow
                      @elseif($member->memberTakenCourseExpiredIfAnyByAssessor($subrole))
                      w3-red
                      @else
                      w3-green
                      @endif
                    @else
                      w3-blue
                    @endif
                    @else
                    w3-blue
                    @endif
                    ">
                      <div class="inner">
                        <h3></h3>
                        <p>{{ $member->user->email }}</p>
                        <p>
                          {{ $member->user->name }}</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      @if (isset($subrole))
                      <a href="{{ route('assessor.subroleTakenCourse', [$subrole, $member->id]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      @endif
                    </div>
                  </div>
                  @endforeach