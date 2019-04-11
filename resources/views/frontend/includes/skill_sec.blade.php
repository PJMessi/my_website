<!-- section-->
<section class="parallax-section dark-bg sec-half parallax-sec-half-left" data-scrollax-parent="true" id="sec4">
    <div class="bg par-elem"  data-bg="{{asset('storage/images/skill_section/'.$skill->image)}}" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{!!$skill->heading!!}</h2>
            <p>{{$skill->description}}</p>
            <div class="horizonral-subtitle"><span>Power</span></div>
        </div>
    </div>
</section>
<!-- section end -->

<!-- section -->
<section data-scrollax-parent="true">
    <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }" >{!!$skill->watermark!!}</div>
    <div class="container">


        <div class="fl-wrap mar-bottom skill-wrap">
            <div class="row">
                <div class="col-md-4">
                    <div class="pr-title fl-wrap">
                        <h3>{{$sitem->heading_1}}</h3>
                        <span>{{$sitem->description_1}}</span>
                    </div>
                    <div class="ci-num"><span>01. - </span></div>
                </div>
                <div class="col-md-8">
                    <!-- skills  -->
                    <div class="piechart-holder animaper" data-skcolor="#FAC921">
                        <div class="row">
                            
                            @if(isset($sitem->items_1))
                                @foreach($sitem->items_1 as $item)
                                    <div class="piechart">
                                        <span class="chart" data-percent="{{$item[1]}}">
                                        <span class="percent"></span>
                                        </span>
                                        <h4>{{$item[0]}}</h4>
                                    </div>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>
                <!-- skills  end-->
            </div>
        </div>

        <!--  Skills-->
        <div class="fl-wrap mar-bottom   mar-top skill-wrap">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="pr-title fl-wrap">
                        <h3>{{$sitem->heading_2}}</h3>
                        <span>{{$sitem->description_2}}</span>
                    </div>
                    <div class="ci-num"><span>02. - </span></div>
                </div>
                <div class="col-md-6">
                    <div class="skillbar-box animaper">
                        @if(isset($sitem->items_2))
                            @foreach($sitem->items_2 as $item)
                                <div class="custom-skillbar-title"><span>{{$item[0]}}</span></div>
                                <div class="skill-bar-percent">{{$item[1]}}%</div>
                                <div class="skillbar-bg" data-percent="{{$item[1]}}%">
                                    <div class="custom-skillbar"></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--  Skills  end-->
   
    </div>
    <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
    <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
    <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
    <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
    <div class="sec-lines"></div>
</section>
<!-- section end -->