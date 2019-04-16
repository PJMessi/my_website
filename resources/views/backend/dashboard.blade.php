@extends('backend.layouts.be_layout')

@section('content')

<!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image overflow-hidden" style="background-image: url('{{asset("backend/media/photos/photo3@2x.jpg")}}');">
            <div class="bg-primary-dark-op">
                <div class="content content-narrow content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                        <div class="flex-sm-fill">
                            <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome {{Auth::user()->name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        @include("backend.includes.message")

        <div class="content">
            <!-- Avatar Sliders -->
            <h2 class="content-heading">Avatar Sliders</h2>
            <div class="row">
                <div class="col-md-8">
                    <!-- Slider with Multiple Slides/Avatars -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">
                                Registered Users
                            </h3>
                        </div>
                        <div class="block-content">

                            <div class="block-content">
                                <table class="table table-borderless table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th>Name</th>
                                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                            @if(Auth::user()->email == "pjmessi25@gmail.com")
                                                <th class="text-center" style="width: 100px;">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($users) > 0)
                                            @foreach($users as $user)
                                                <tr>
                                                    <th class="text-center" scope="row">{{$loop->index + 1}}</th>
                                                    <td class="font-w600 font-size-sm">
                                                        <a>{{$user->name}}</a>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell">
                                                        @if($user->email == "pjmessi25@gmail.com")
                                                            <span class="badge badge-info">
                                                                Super Admin
                                                            </span>
                                                        @else
                                                            <span class="badge badge-warning">
                                                                Admin
                                                            </span>
                                                        @endif
                                                    </td>

                                                    @if(Auth::user()->email == "pjmessi25@gmail.com")
                                                    <td class="text-center">
                                                        <div class="btn-group">                                                            
                                                            @if($user->email != "pjmessi25@gmail.com")
                                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$user->id}}" type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove User">
                                                                    <i class="fa fa-fw fa-times"></i>
                                                                </button>

                                                                <form id="form_del_user_row_{{$user->id}}" style="display:none" method="POST" action="{{route('delete_user', ['id' => $user->id])}}">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                </form>

                                                                <!--confirm delete modal-->
                                                                <div class="modal" id="delete_row_modal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="block block-themed block-transparent mb-0">
                                                                                <div class="block-header bg-primary-dark">
                                                                                    <h3 class="block-title">Are you sure?</h3>
                                                                                    <div class="block-options">
                                                                                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                                            <i class="fa fa-fw fa-times"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="block-content font-size-sm">
                                                                                    <p>This action cannot be reversed.</p>
                                                                                </div>
                                                                                <div class="block-content block-content-full text-right border-top">
                                                                                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_user_row_{{$user->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            @endif
                                                        </div>
                                                    </td>
                                                    @endif

                                                </tr>                                                
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>

                                <hr>
                                
                                <!--for subscribers-->
                                <table class="table table-borderless table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th>Subscribers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($subscriber_emails) > 0)
                                            @foreach($subscriber_emails as $subscriber_email)
                                                <tr>
                                                    <th class="text-center" scope="row">{{$loop->index + 1}}</th>
                                                    <td class="font-w600 font-size-sm">
                                                        <a>{{$subscriber_email->email}}</a>
                                                    </td>
                                                </tr>                                                
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <!--end for subscribers-->


                            </div>

                        </div>
                    </div>
                    <!-- END Slider with Multiple Slides/Avatars -->
                </div>
                <div class="col-md-4">
                
                    <div class="block">

                        <div class="block-header">
                            <h3 class="block-title">You</h3>
                        </div>

                        <div class="block-content">
                            <div class="js-slider text-center" data-dots="true" data-arrows="true">
                               
                                <div class="py-3">
                                    <img class="img-avatar" src="{{asset('storage/images/users/'.Auth::user()->avatar)}}" alt="">
                                    <div class="mt-2 font-w600">{{Auth::user()->name}}</div>
                                    <div class="font-size-sm text-muted">{{Auth::user()->username}}</div>
                                    <div class="font-size-sm text-muted">{{Auth::user()->email}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
      
                </div>
            </div>
            <!-- END Avatar Sliders -->

            <!-- Content Sliders -->
            {{-- <h2 class="content-heading">Content Sliders</h2>
            <div class="row">
                <div class="col-md-4">
                    <!-- Tiles Slider 1 -->
                    <div class="js-slider" data-dots="true">
                        <div class="block text-center mb-0">
                            <div class="block-content py-5 bg-info">
                                <i class="fab fa-twitter-square fa-5x text-black-50"></i>
                                <div class="font-size-h3 font-w600 mt-3 text-white">26.4k</div>
                                <div class="text-white-75">Followers</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5 bg-danger">
                                <i class="fab fa-youtube-square fa-5x text-black-50"></i>
                                <div class="font-size-h3 font-w600 mt-3 text-white">12000</div>
                                <div class="text-white-75">Video Views</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5 bg-primary">
                                <i class="fab fa-facebook-square fa-5x text-black-50"></i>
                                <div class="font-size-h3 font-w600 mt-3 text-white">8.5k</div>
                                <div class="text-white-75">Likes</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Tiles Slider 1 -->
                </div>
                <div class="col-md-4">
                    <!-- Tiles Slider 2 -->
                    <div class="js-slider slick-nav-hover" data-dots="true" data-arrows="true">
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fab fa-windows fa-5x text-gray-dark"></i>
                                <div class="font-size-h3 font-w600 mt-3">10</div>
                                <div class="text-muted">version</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-gamepad fa-5x text-primary"></i>
                                <div class="font-size-h3 font-w600 mt-3">320</div>
                                <div class="text-muted">Games</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fab fa-android fa-5x text-danger"></i>
                                <div class="font-size-h3 font-w600 mt-3">10</div>
                                <div class="text-muted">Smartphones</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Tiles Slider 2 -->
                </div>
                <div class="col-md-4">
                    <!-- Tiles Slider 3 -->
                    <div class="js-slider slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-inbox fa-5x text-success"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">New messages</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-file-alt fa-5x text-warning"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">Files</div>
                            </div>
                        </div>
                        <div class="block text-center bg-white mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-server fa-5x text-danger"></i>
                                <div class="font-size-h3 font-w600 mt-3">26</div>
                                <div class="text-muted">Websites</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Tiles Slider 3 -->
                </div>
            </div> --}}
            <!-- END Content Sliders -->

            <!-- Image Sliders -->
            {{-- <h2 class="content-heading">Image Sliders</h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Slider with dots -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Dots</h3>
                        </div>
                        <div class="js-slider" data-dots="true">
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo2@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo3@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo4@2x.jpg" alt="">
                            </div>
                        </div>
                        <!-- END Slider with dots -->
                    </div>
                    <!-- END Dots -->
                </div>
                <div class="col-md-6">
                    <!-- Slider with dots and white hover arrows -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Dots &amp; White Hover Arrows</h3>
                        </div>
                        <div class="js-slider slick-nav-white slick-nav-hover" data-dots="true" data-arrows="true">
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo7@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo8@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo9@2x.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- END Slider with dots and white hover arrows -->
                </div>
                <div class="col-md-6">
                    <!-- Slider with inner dots and black arrows -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Inner Dots &amp; Black Arrows</h3>
                        </div>
                        <div class="js-slider slick-nav-black slick-dotted-inner slick-dotted-white" data-dots="true" data-arrows="true">
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo21@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo22@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo23@2x.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- END Slider with inner dots and black arrows -->
                </div>
                <div class="col-md-6">
                    <!-- Slider with autoplay and white inner dots -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">
                                <i class="fa fa-play fa-fw text-primary"></i> Autoplay &amp; White Inner Dots
                            </h3>
                        </div>
                        <div class="js-slider slick-dotted-inner slick-dotted-white" data-dots="true" data-autoplay="true" data-autoplay-speed="3000">
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo13@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo14@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo24@2x.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- END Slider with autoplay and white inner dots -->
                </div>
                <div class="col-md-12">
                    <!-- Slider with multiple images and center mode -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">
                                <i class="fa fa-play fa-fw text-primary"></i> Multiple Images &amp; Center Mode
                            </h3>
                        </div>
                        <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true" data-slides-to-show="3" data-center-mode="true" data-autoplay="true" data-autoplay-speed="3000">
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo15@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo16@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo17@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo18@2x.jpg" alt="">
                            </div>
                            <div>
                                <img class="img-fluid" src="assets/media/photos/photo19@2x.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- END Slider with multiple images and center mode -->
                </div>
            </div> --}}
            <!-- END Image Sliders -->
        </div>
        <!-- END Page Content -->

    </main>
@endsection