<section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
    <div class="bg par-elem"  data-bg="{{asset('storage/images/fact_section/'.$fact->image)}}" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{!!$fact->heading!!}</h2>
            <p>{{$fact->description}}</p>
            <div class="horizonral-subtitle"><span>Numbers</span></div>
        </div>
        <div class="fl-wrap facts-holder">
            
            @if( count($fitems) > 0 )
                @foreach($fitems as $fitem)
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="{{$fitem->amount}}">0</div>
                                </div>
                            </div>
                            <h6>{{$fitem->heading}}</h6>
                        </div>
                    </div>
                @endforeach
            @endif
                                     
        </div>
    </div>
</section>