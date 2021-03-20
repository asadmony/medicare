<div class="TickerNews default_theme_2" id="T3" style="width: 100% !important;">
  <div class="leftside" >
    <h4 class=" w3-{{$blogParameter->main_color}}">Featured</h4>
  </div>
  <div class="ti_wrapper">
    <div class="ti_slide">
      <div class="ti_content">

        @foreach($headlines as $post)
        <div class="ti_news">
          <a href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">
            <span><i class="fa fa-check-circle w3-text-purple"></i></span> 
            {{$post->title}}
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
