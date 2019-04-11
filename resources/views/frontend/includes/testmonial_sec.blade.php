<section  data-scrollax-parent="true" id="sec6">
    <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >{!!$testmonial->watermark!!}</div>
    <div class="container">
        <div class="section-title fl-wrap">
            <h3>{{$testmonial->heading_1}}</h3>
            <h2>{!!$testmonial->heading_2!!}</h2>
            <p>{{$testmonial->description}}</p>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="container">
        <!-- serv-carousel-wrap-->  
        <div class="serv-carousel-wrap slider-carousel-wrap fl-wrap">
            <div class="sp-cont  sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
            <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
            <!-- serv-carousel --> 
            <div class="serv-carousel fl-wrap cur_carousel-slider-container">

                @if(isset($titems) && count($titems) > 0)
                    @foreach ($titems as $item)
                        <div class="serv-carousel-item">
                            <div class="serv-wrap fl-wrap">

                                <div class="time-line-icon">
                                    <i class="far fa-comment-alt"></i>
                                </div>
                                
                                <h4>{{$item->name}}</h4>
                                <div class="process-details">
                                    <div class="serv-img">
                                        <img src="{{asset('storage/images/titem_section/'.$item->image)}}" alt=""> 
                                    </div>

                                    <div class="listing-rating card-popup-rainingvis">
                                        @for($i=0; $i<$item->stars; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>

                                    <p>{{$item->content}}</p>
                                    <h6>{!!$item->portfolio->title!!}</h6>
                                </div>
                                <span class="process-numder">{{addZero($loop->index+1)}}.</span>
                            </div>
                        </div>                        
                    @endforeach
                @endif
                                          
                                                                            
            </div>
            <!-- serv-carousel  end--> 
        </div>
        <!-- serv-carousel-wrap end-->  
    </div>
    <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
    <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
    <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
    <div class="sec-lines"></div>

</section>
