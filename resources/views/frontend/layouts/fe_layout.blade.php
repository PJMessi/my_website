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
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
                <?php
                    function addZero($index){
                        if($index < 10 ){
                            $show = "0" . $index;
                            return $show;
                        }
                        return $index;
                    }
                ?>
            
            @include("frontend.includes.navbar")
           
            <!-- wrapper-->
            <div id="wrapper">

                <!-- scroll-nav-wrap-->
                <div class="scroll-nav-wrap fl-wrap">
                    <div class="scroll-down-wrap">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                        <span>Scroll Down</span>
                    </div>
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a class="scroll-link act-link" href="#sec1">Hero</a></li>
                            <li><a class="scroll-link" href="#sec2">About</a></li>
                            <li><a class="scroll-link" href="#sec3">Resume</a></li>
                            <li><a class="scroll-link" href="#sec4">Skills</a></li>
                            <li><a class="scroll-link" href="#sec5">Projects</a></li>
                            <li><a class="scroll-link" href="#sec6">Clients</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- scroll-nav-wrap end-->

                @include("frontend.includes.main_sec")
                
                <!-- Content-->
                <div class="content">

                    @include("frontend.includes.about_sec")
                    @include("frontend.includes.fact_sec")
                    @include("frontend.includes.resume_sec")
                    
                    @include("frontend.includes.skill_sec")
                    @include("frontend.includes.project_sec")
                    @include("frontend.includes.testmonial_sec")
                           
              
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

                @include("frontend.includes.contact_sec")         

                <a class="contact-btn color-bg">
                    {!!$miscellaneous->trButton[0]!!}
                    <span>{{$miscellaneous->trButton[1]}}</span>
                </a>  
    	      
            </div>
{{-- 
            <!-- share-wrapper -->                       
            <div class="share-wrapper isShare">
                <div class="share-title"><span>Share</span></div>
                <div class="close-share soa"><span>Close</span><i class="fal fa-times"></i></div>
                <div class="share-inner soa">
                    <div class="share-container"></div>
                </div>
            </div>
            <!-- share-wrapper end -->	 --}}

        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{asset('frontend/js/frontend.js')}}"></script>
    </body>
</html>