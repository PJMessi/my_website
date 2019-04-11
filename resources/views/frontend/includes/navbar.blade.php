 <!-- header-->
 <header class="main-header">
        <a class="logo-holder" href="{{route('show_frontend_main')}}">
        <img src="{{asset('storage/images/' . $miscellaneous->logo)}}"  alt="">
        </a>
        <!-- nav-button-wrap-->
        <div class="nav-button but-hol">
            <span  class="nos"></span>
            <span class="ncs"></span>
            <span class="nbs"></span>
            <div class="menu-button-text">Menu</div>
        </div>
        <!-- nav-button-wrap end-->
        <div class="header-social">
            <ul>
                @if( !empty( $contact->facebook ) )
                    <li><a href="{{$contact->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                @endif

                @if( !empty( $contact->linkedIn ) )
                    <li><a href="{{$contact->linkedIn}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                @endif

                @if( !empty( $contact->github ) )
                    <li><a href="{{$contact->github}}" target="_blank"><i class="fab fa-github"></i></a></li>
                @endif

                @if( !empty( $contact->twitter ) )
                    <li><a href="{{$contact->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                @endif
            </ul>
        </div>
        <!--  showshare -->  
        <div class="show-share" onclick="$('html, body').animate({scrollTop:$(document).height()}, 'slow');">
            <i class="fal fa-envelope"></i>
            <span>Get In Touch</span>
        </div>
        <!--  showshare end -->
    </header>
    <!--  header end -->
    <!--  navigation bar -->
    <div class="nav-overlay">
        <div class="tooltip color-bg">Close Menu</div>
    </div>
    <div class="nav-holder">
        <a class="header-logo" href="index.html"><img src="{{asset('storage/images/'.$miscellaneous->txt_logo)}}" alt=""></a> 
        <div class="nav-title"><span>Menu</span></div>
        <div class="nav-inner-wrap">
            <nav class="nav-inner sound-nav scroll-init" id="menu">
                <ul>
                    <li>                        
                        <a href="#sec1" class="act-link scroll-link whiteColor">Home</a>
                    </li>

                    <li>                        
                        <a href="#sec2" class="act-link scroll-link whiteColor">About</a>
                    </li>
                    
                    <li>                        
                        <a href="#sec3" class="act-link scroll-link whiteColor">Resume</a>
                    </li>

                    <li>                        
                        <a href="#sec4" class="act-link scroll-link whiteColor">Skills</a>
                    </li>
                    
                    <li>                        
                        <a href="#sec5" class="act-link scroll-link whiteColor">Portfolio</a>
                    </li>

                    <li>                        
                        <a href="#sec6" class="act-link scroll-link whiteColor">Clients</a>
                    </li>

                    <li>                        
                        <a href="#sec7" class="act-link scroll-link whiteColor">Contact</a>
                    </li>
                   
                </ul>
            </nav>
        </div>
    </div>
    <!--  navigation bar end -->
