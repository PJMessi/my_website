<section data-scrollax-parent="true" id="sec2">
    <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" > {!!$about->watermark!!} </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="collage-image fl-wrap">
                    <div class="collage-image-title" data-scrollax="properties: { translateY: '150px' }">{{$about->image_label}}</div>
                    <img src="{{asset('storage/images/about_section/'.$about->image)}}" class="respimg" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-about fl-wrap">
                    <h5>{{$about->heading_1}}</h5>
                    <h2>{!!$about->heading_2!!}</h2>
                    <p>{{$about->description}}</p>
                    <!-- features-box-container --> 
                    <div class="features-box-container fl-wrap">
                        <div class="row">

                            @if( count($aitems) > 0 )
                                @foreach( $aitems as $aitem )
                                    <!--features-box --> 
                                    <div class="features-box col-md-6">
                                        <div class="time-line-icon">
                                            <i class="{{$aitem->icon}}"></i>
                                        </div>
                                        <h3>{{$aitem->heading}}</h3>
                                        <p>{{$aitem->description}}</p>
                                    </div>
                                    <!-- features-box end  --> 
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <!-- features-box-container end  -->
                    <a href="{{$about->button[0]}}" class="btn float-btn flat-btn color-btn">{{$about->button[1]}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-parallax-module" data-position-top="90"  data-position-left="25" data-scrollax="properties: { translateY: '-250px' }"></div>
    <div class="bg-parallax-module" data-position-top="70"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
    <div class="sec-lines"></div>
</section>