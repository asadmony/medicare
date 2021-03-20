<span class="pr-rating-area">
@if($user->star5())
<span title="Diamond Plus User">
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
</span>
@elseif($user->star4())
<span title="Diamond User">
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
      <span>☆</span>
      </span>
@elseif($user->star3())
<span title="Golden Plus User">
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
      <span>☆</span>
      <span>☆</span>
      </span>
@elseif($user->star2())
<span title="Golden User">
<span class="r-fill">☆</span>
<span class="r-fill">☆</span>
      <span>☆</span>
      <span>☆</span>
      <span>☆</span>
      </span>
@elseif($user->star1())
<span title="Subscriber">
<span class="r-fill">☆</span>
      <span>☆</span>
      <span>☆</span>
      <span>☆</span>
      <span>☆</span>
      </span>
@endif
</span>