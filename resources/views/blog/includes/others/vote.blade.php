@if($voteOfToday)
<div class="box box-widget" id="vote-area">
            <div class="box-header w3-panel w3-leftbar w3-border-green">
              <h3 class="box-title">
               Online Vote
              </h3>
            </div>
            <div class="box-body" style="background: #666;">

            <div class="vote-question w3-text-white w3-large">

              <p>

                {{$voteOfToday->title}}
              
            </p>
              
            </div>
            <hr>

            <div class="vote-form-area w3-text-white w3-large">


            <form method="post" action="{{route('welcome.voteCastedPost', $voteOfToday)}}">

              {{csrf_field()}}
              
              <div class="form-group">
                
                <label class="radio-inline">
      <input type="radio" name="cast" value="yes" required>হ্যাঁ
    </label> &nbsp; 
    <label class="radio-inline">
      <input type="radio" name="cast" value="no">না
    </label> &nbsp; 
    <label class="radio-inline">
      <input type="radio" name="cast" value="silent">No Comment
    </label>
              </div>
@if($m_v)
<button type="button" class="w3-btn w3-white w3-round w3-border w3-border-blue w3-small w3-hover-blue "><i class="fa fa-check"></i> Your Vote Taken</button>
@else
    <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-blue w3-small w3-hover-blue "><i class="fa fa-check"></i> Vote Now</button>
@endif
    <a href="{{route('welcome.previousVots')}}" class="btn btn-link w3-text-white">Previous Result </a>

  </form>
          
              
            </div>

<hr>



<div class="vote-cast-area w3-text-white">
  <p>
     {{$voteOfToday->casts()->count()}} People vote.
  </p>
</div>

<hr>

<div class="vote-previous w3-text-white">
  <p>
    This is only online visitor's vote.
  </p>
</div>



   
              
            </div>
          </div>
@endif