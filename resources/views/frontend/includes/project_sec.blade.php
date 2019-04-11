{{-- <section class="dark-bg" id="sec5">
    <div class="fet_pr-carousel-title">
        <div class="fet_pr-carousel-title-item">
            <h3>{{$project->heading}}</h3>
            <p>{{$project->description}}</p>
            <a href="{{$project->button[0]}}" class="btn float-btn flat-btn color-btn mar-top">{{$project->button[1]}}</a>
        </div>
    </div>
</section> --}}


<section data-scrollax-parent="true" class="dark-bg" id="sec5">
    <div class="section-subtitle"  data-scrollax="properties: { translateY: '150px' }" >Portfolio<span>//</span></div>
    <div class="container">

        @if(count($pitems) > 0)
            @foreach($pitems as $item)
                @if($loop->index % 2 == 0)
              
                    <div class="parallax-item fl-wrap" data-scrollax-parent="true">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="parallax-header">
                                    <span>Category : </span>
                                    
                                    @if( count($item->category) > 0 )
                                        @foreach($item->category as $category)
                                            <a>{{$category}}</a> 
                                        @endforeach
                                    @endif

                                </div>
                                @if(isset($item->images[0]))<img src="{{asset('storage/images/pitem_section/'.$item->images[0])}}"   alt="">@endif
                            </div>
                            <div class="parallax-text right-pos" data-scrollax="properties: { translateY: '-250px' }">
                                <h3><a href="{{route('show_portfolio_detail', ['id'=>$item->id])}}">{!!$item->title!!}</a></h3>
                                <h4><span>{{$item->description}}</span></h4>
                                <a href="{{route('show_portfolio_detail', ['id'=>$item->id])}}" class="btn float-btn flat-btn color-btn">View project</a>
                            </div>
                            <div class="album-thumbnails">
                                <div data-position-left2="65" data-position-top2="-5" data-scrollax="properties: { translateY: '-150px' }">
                                    @if(isset($item->images[1]))<img src="{{asset('storage/images/pitem_section/'.$item->images[1])}}" alt="" class="respimg">@endif
                                </div>
                                <div data-position-left2="80" data-position-top2="50" data-scrollax="properties: { translateY: '-350px' }">

                                </div>
                            </div>
                        </div>
                        <div class="parallax-item-number rg-num">.{{addZero($loop->index + 1)}}</div>
                    </div>
               
                @else
            
                    <div class="parallax-item fl-wrap" data-scrollax-parent="true">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <div class="parallax-header right-parallax-header">
                                    <span>Category : </span>
                                    @if( count($item->category) > 0 )
                                        @foreach($item->category as $category)
                                            <a>{{$category}}</a>
                                        @endforeach
                                    @endif
                                </div>
                                @if(isset($item->images[0]))<img  src="{{asset('storage/images/pitem_section/'.$item->images[0])}}"   alt="">@endif
                            </div>
                            <div class="parallax-text left-pos" data-scrollax="properties: { translateY: '-250px' }">
                                <h3><a href="{{route('show_portfolio_detail', ['id'=>$item->id])}}">{!!$item->title!!}</a></h3>
                                <h4><span>{{$item->description}}</span></h4>
                                <a href="{{route('show_portfolio_detail', ['id'=>$item->id])}}" class="btn float-btn flat-btn color-btn">View project</a>
                            </div>
                            <div class="album-thumbnails">
                                <div data-position-left2="0" data-position-top2="0" data-scrollax="properties: { translateY: '-150px' }">
                                    @if(isset($item->images[1]))<img src="{{asset('storage/images/pitem_section/'.$item->images[1])}}" alt="" class="respimg">@endif
                                </div>
                                <div data-position-left2="25" data-position-top2="60" data-scrollax="properties: { translateY: '-50px' }">
                                    @if(isset($item->images[2]))<img src="{{asset('storage/images/pitem_section/'.$item->images[1])}}">@endif
                                </div>
                            </div>
                        </div>
                        <div class="parallax-item-number lf-num">.{{addZero($loop->index + 1)}}</div>
                    </div>
      
                @endif                
                
                @if($loop->index < count($pitems) - 1 )<div class="paralax-sec-separator fl-wrap"></div>@endif

            @endforeach
        @endif
       

    </div>
    <div class="sec-lines"></div>
</section>