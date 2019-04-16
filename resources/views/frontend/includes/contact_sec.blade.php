<div class="height-emulator fl-wrap" id="sec7"></div>
<footer class="main-footer fixed-footer">
    <!--footer-inner--> 
    <div class="footer-inner fl-wrap">
        <div class="container">
            <div class="partcile-dec" data-parcount="90"></div>
            <div class="row">
                <div class="col-md-2">
                    <div class="footer-title fl-wrap">
                        <span>PJMessi</span>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer-header fl-wrap"><span>01.</span>Last Twitts</div>
                    <div class="footer-box fl-wrap">
                        <div class="twitter-swiper-container fl-wrap" id="twitts-container"></div>
                        <a target="_blank" href="{{$contact->twitter}}" class="btn float-btn trsp-btn">Follow</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer-header fl-wrap"><span>02.</span> Subscribe / Contacts</div>
                    <!-- footer-box--> 
                    <div class="footer-box fl-wrap">
                        <p>Want to be notified when i come up with fantastic offers? Drop your email below.</p>
                        <div class="subcribe-form fl-wrap">
                            <form id="subscribe_form" class="fl-wrap" method="POST" action="{{route('save_subscriber')}}">
                                @csrf
                                <input class="enteremail" name="email_sub" id="email_sub" placeholder="email" spellcheck="false" type="email" required>
                                <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-paper-plane"></i> Send </button>
                                <label id="sub_message" for="subscribe-email" class="subscribe-message"></label>
                            </form>
                        </div>
                        <!-- footer-contacts-->                    
                        <div class="footer-contacts fl-wrap">
                            <ul>
                                <li><i class="fal fa-phone"></i><span>Phone :</span><a href="tel:{{$contact->phone}}">{{$contact->phone}}</a></li>
                                <li><i class="fal fa-envelope"></i><span>Email :</span><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>
                                <li><i class="fal fa-map-marker"></i><span>Address</span><a>{{$contact->address}}</a></li>
                            </ul>
                        </div>
                        <!-- footer end -->                                        
                        <!-- footer-socilal -->            
                        <div class="footer-socilal fl-wrap">
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
                        <!-- footer-socilal end -->       
                    </div>
                    <!-- footer-box end--> 
                </div>
            </div>
        </div>
    </div>
    <!--footer-inne endr--> 
    <!--subfooter--> 
    <div class="subfooter fl-wrap">
        <div class="container">
            <!-- policy-box-->
            <div class="policy-box">
                <span>{!!$miscellaneous->footer!!}</span>
            </div>
            <!-- policy-box end-->
            <a href="#" class="to-top color-bg"><i class="fal fa-angle-up"></i><span></span></a>
        </div>
    </div>
    <!--subfooter end--> 
</footer>