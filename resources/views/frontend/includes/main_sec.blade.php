<div class="hero-wrap" id="sec1" data-scrollax-parent="true">

    <div class="hero-inner fl-wrap full-height">

        <div class="half-hero-wrap">

            <h1>{!!$main->heading_1!!}</h1>
            <h4>{{$main->heading_2}}</h4>
            <div class="clearfix"></div>
            <a href="{{$main->button[0]}}" class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">{{$main->button[1]}}</a> 

        </div>

        <div class="bg"  data-bg="{{asset('storage/images/main_section/'.$main->image)}}" data-scrollax="properties: { translateY: '250px' }" ></div>
        <div class="overlay"></div>

        <div class="pattern-bg"></div>
        <div class="hero-line-dec"></div>

    </div>

</div>
