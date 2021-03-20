@if ($message->userfrom_id == $messageFrom->id)
            <div class="row w3-card px-2 py-1 mb-2">
              <div class="w-100">
                <div class="media">
                  <img class="align-self-center mr-3 rounded" style="max-width: 60px; width: 15vw;" src="{{ route('imagecache',['template'=>'ppsm','filename'=>$message->userFrom->profilePic()]) }}" alt="Generic placeholder image">
                  <div class="media-body col-xs-12">
                    <h5 class="mt-0">{{ $message->message }}</h5>
                    <div>
                      <p class="small float-left">{{ now()->parse($message->created_at)->format('d-M-Y H:i a') }} form {{ $message->role_from ?? 'individual' }}</p>
                      @if ($message->messageable != null)
                      <p class="small float-right">
                        @if ($message->company_id != null)
                            {{ $message->company->title }} |  
                        @endif
                        {{ $message->messageable->course_title ?: __('Exam -') .$message->messageable->taken_course_exam_id ?? '' }}
                      </p>
                      @endif
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="row w3-card px-2 py-1 mb-2">
              <div class="col w-90 w3-white w3-float-right mr-0">
                <div class="media">
                  <div class="media-body  col-xs-12">
                    <h5 class="mt-0 mb-1 text-right">{{ $message->message }}</h5>
                    <div>
                      <p class="small text-right">{{ now()->parse($message->created_at)->format('d-M-Y H:i a') }}</p>
                      @if ($message->messageable != null)
                      <p class="small float-left">
                        @if ($message->company_id != null)
                            {{ $message->company->title }} |  
                        @endif
                        {{ $message->messageable->course_title ?: $message->messageable_id ?? '' }}
                      </p>
                      @endif
                    </div>
                  </div>
                  <img class="ml-3 align-self-center float-right rounded" style="max-width: 60px; width: 15vw; " src="{{ route('imagecache',['template'=>'ppsm','filename'=>$message->userFrom->profilePic()]) }}" alt="Generic placeholder image">
                </div>
              </div>
            </div>
            @endif