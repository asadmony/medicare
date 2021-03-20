
<div class="main main-raiseds "  style="z-index: 400;margin-top: -20px;">
    <div class="section section-basic" style="min-height: 900px;">
        <div class="container">

            @if($page->left_sidebar)

            <div class="row">
                <div class="col-sm-3">
                    @if (Browser::isDesktop())
                    @auth
                    @include('user.includes.others.myLeftMenu')
                    @else
                    @include('welcome.includes.others.welcomeLeftSidebar')
                    @endauth
                    @endif
                </div>
                <div class="col-sm-9">
                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container" style="background: #f8f8f8;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-widget mb-0 w3-hover-shadow">
                                        <div class="box-body">
                                            @if (!$page->title_hide)
                                            <h1 class="w3-xlarge">{{ $page->page_title }}</h1>
                                            @endif
                                            @foreach($page->activeItems() as $item)
                                            {!! $item->content !!}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- overlay here --}}
                        <!-- Loading (remove the following to stop the loading)-->
                        <div class="overlay my-loading-overlay" style="display: none;">
                          <i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>
                      </div>
                      <!-- end loading -->
                  </div>
                  @if (Browser::isDesktop())
                  @else
                  @include('welcome.includes.others.hotLineImage')
                  @include('welcome.includes.others.ourWebsiteVisitors')
                  <div class="w3-card-2">
                    <div class="box box-widget">         
                        <div class="box-body">
                            @include('welcome.includes.others.fbPageArea')
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        @else

        <div class="row" style="margin-top: -50px;">
            <div class="col-sm-12">
                @if (!$page->title_hide)
                <h1 class="w3-xlarge">{{ $page->page_title }}</h1>
                @endif
                @foreach($page->activeItems() as $item)
                {!! $item->content !!}
                @endforeach
            </div>
        </div>

        @endif

        {{-- <div align="center">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
            style="display:block; text-align:center;"
            data-ad-layout="in-article"
            data-ad-format="fluid"
            data-ad-client="ca-pub-3322244656717684"
            data-ad-slot="2385267914"></ins>
            <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
         </script>
     </div> --}}
 </div>
</div>
</div>
