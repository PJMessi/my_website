
<section data-scrollax-parent="true" id="sec3">
    <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >{!!$resume->watermark!!}</div>
    <div class="container">
        <!-- section-title -->
        <div class="section-title fl-wrap">
            <h3>{!!$resume->heading_1!!}</h3>
            <h2>{!!$resume->heading_2!!}</h2>
            <p>{{$resume->description}}</p>
        </div>
        <!-- section-title end -->
        <!-- custom-inner-holder -->
        <div class="custom-inner-holder">

            @if( count($ritems) > 0 )

                @foreach($ritems as $ritem)

                    @if( $ritem->image != "" )                        
                       
                        <div class="custom-inner">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="custom-inner-header educ">
                                        <i class="{{$ritem->icon}}"></i>
                                        <h3>{{$ritem->heading}}</h3>
                                        <span>{{$ritem->interval}}</span>
                                    </div>
                                    <div class="ci-num"><span>{{addZero($loop->index + 1)}}. - </span></div>
                                </div>
                                <div class="col-md-5">
                                    <div class="custom-inner-content fl-wrap">
                                        {!!$ritem->description!!}
                                    </div>
                                </div>
                                <div class="col-md-3"><img src="{{asset('storage/images/ritem_section/'.$ritem->image)}}" class="respimg" data-scrollax="properties: { translateY: '270px' }" alt=""></div>
                            </div>
                        </div>                   
                      
                    @else
             
                        <div class="custom-inner">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="custom-inner-header workres">
                                        <i class="{{$ritem->icon}}"></i>
                                        <h3>{{$ritem->heading}}</h3>
                                        <span>{{$ritem->interval}}</span>
                                    </div>
                                    <div class="ci-num"><span>{{addZero($loop->index + 1)}}. - </span></div>
                                </div>
                                <div class="col-md-8">
                                    <div class="custom-inner-content fl-wrap">
                                        {!!$ritem->description!!}
                                    </div>
                                </div>
                            </div>
                        </div>
      
                    @endif

                @endforeach

            @endif
            
        </div>
        <!-- custom-inner-holder -->
        <a href="{{$resume->button[0]}}" class="btn float-btn flat-btn color-btn mar-top">{{$resume->button[1]}}</a> 
    </div>
    <div class="sec-lines"></div>
</section>