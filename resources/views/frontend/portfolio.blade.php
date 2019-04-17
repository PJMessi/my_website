<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>{{$miscellaneous->title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{mix('frontend/css/frontend.css')}}">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{asset('storage/images/' . $miscellaneous->favicon)}}">
    </head>
    <body>
        <div class="loader-wrap">
            <div class="pin"></div>
        </div>

        <div id="main">
     
            @include("frontend.includes.navbar")
  
            <div id="wrapper" class="single-page-wrap">
         
                <div class="content">

                    <div class="single-page-decor"></div>
                    <div class="single-page-fixed-row">
                        <div class="scroll-down-wrap">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                            <span>Scroll Down</span>
                        </div>
                        <a href="{{route("show_frontend_main")}}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to home</span></a>
                    </div>


                    @if(count($portfolio->images)>0)

                        <section class="no-padding dark-bg no-hidden">
                            <!-- show-case-slider-wrap-->   
                            <div class="show-case-slider-wrap slider-carousel-wrap show-case-slider-wrap-style2">
                                <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                                <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                                <div class="show-case-slider cur_carousel-slider-container lightgallery fl-wrap full-height" data-slick='{"centerMode": true}'>
                                
                                    @foreach($portfolio->images as $image)
                                    <div class="show-case-item" data-curtext="Lokomotive Project">
                                        <div class="show-case-wrapper fl-wrap full-height">
                                            <img src="{{asset('storage/images/pitem_section/'.$image)}}" alt="">
                                            <a href="{{asset('storage/images/pitem_section/'.$image)}}" class="fet_pr-carousel-box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                        </div>
                                    </div> 
                                    @endforeach
                                                                                                                                                            
                                </div>
                            </div>
                            <!-- show-case-slider-wrap end-->  
                            <div class="single-project-title single-project-title-style-2">
                                <h2><span class="caption">{!!$portfolio->title!!}</span></h2>
                            </div>
                        </section>

                    @endif
       
                    <section data-scrollax-parent="true">
                        <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }">{!!$portfolio->watermark!!}</div>
                        <div class="container">
                            <!-- det box-->
                            <div class="fl-wrap mar-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fixed-column l-wrap">
                                            <div class="pr-title fl-wrap">
                                                <h3>Project Details</h3>
                                                <span>{{$portfolio->description}}</span>
                                            </div>
                                            <div class="ci-num"><span>01.</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="details-wrap fl-wrap">
                                            <h3>{!!$portfolio->title!!}</h3>
                                            <div class="parallax-header"><span>Category : </span>
                                                @if( count($portfolio->category) > 0 )
                                                    @foreach( $portfolio->category as $category )
                                                        <a>{{$category}}</a> 
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                            {!!$portfolio->detail!!}
                                        </div>
                                        <div class="pr-list fl-wrap">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li><span>Date :</span> 26.05.2018 </li>
                                                        <li><span>Client :</span>  {{$portfolio->client}} </li>
                                                        <li><span>Skills :</span> {{$portfolio->skill}} </li>
                                                        <li><span>Location : </span> {{$portfolio->location}} </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="fl-wrap pr-list-det">
                                                        <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                                        <h5>Client Review.</h5>

                                                        @if( $portfolio->testmonial->status == "PUBLISHED" )
                                                            <p>"{{$portfolio->testmonial->content}}"</p>
                                                            <p>{{$portfolio->testmonial->name}}</p>
                                                        @else
                                                            <p>Client hasn't posted their review.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                             
                                    </div>
                                </div>
                                <div class="limit-box fl-wrap"></div>
                            </div>
                            <!-- det box end-->
                     
                        </div>
                        <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
                        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
                        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
                        <div class="sec-lines"></div>
                    </section>
                            
                    <section class="dark-bg2 small-padding order-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Wanna give me a quick call? </h3>
                                </div>
                                <div class="col-md-4"><a href="tel:{{$contact->phone}}" class="btn flat-btn color-btn">Call me</a> </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!-- Content end -->
               
                @include("frontend.includes.contact_sec")

         
                <a class="contact-btn color-bg">
                    {!!$miscellaneous->trButton[0]!!}
                    <span>{{$miscellaneous->trButton[1]}}</span>
                </a>                  
	      
            </div>
                        
        </div>

        <script type="text/javascript" src="{{asset('frontend/js/frontend.js')}}"></script>
    </body>
</html>