@extends('layouts.app')

@section('title', 'NewsFeed')

@section('content')
    <div id="page-contents">
        <div class="container">
            <div class="row">

                <!-- Newsfeed Common Side Bar Left
          ================================================= -->
                <div class="col-md-3 static">
                    <div class="profile-card">
                        @yield('avatar')
                    </div><!--profile card ends-->
                    <ul class="nav-news-feed">
                        <li><i class="icon ion-ios-paper"></i><div><a href="/persona/{{ $persona->slug }}">My Newsfeed</a></div></li>
                        <li><i class="icon ion-ios-people"></i><div><a href="/persona">People Nearby</a></div></li>
                        <li><i class="icon ion-ios-people-outline"></i><div><a href="/persona/amigos/{{ $persona->slug }}">Friends</a></div></li>
                    </ul><!--news-feed links ends-->
                    <div id="chat-block">
                        <div class="title">Chat online</div>
                        <ul class="online-users list-inline">
                            <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="John Doe"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="James Carter"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="Anna Young"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                            <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                        </ul>
                    </div><!--chat block ends-->
                </div>

                <div class="col-md-7">

                    <!-- Post Create Box
                    ================================================= -->
                    <div class="create-post">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                                    <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="tools">
                                    <ul class="publishing-tools list-inline">
                                        <li><a href="#"><i class="ion-compose"></i></a></li>
                                        <li><a href="#"><i class="ion-images"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                                        <li><a href="#"><i class="ion-map"></i></a></li>
                                    </ul>
                                    <button class="btn btn-primary pull-right">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- Post Create Box End -->
                @yield("people_nearby_content")
                </div>
                <!-- Newsfeed Common Side Bar Right
          ================================================= -->
                    <div class="col-md-2 static">
                        <div class="suggestions" id="sticky-sidebar">
                            <h4 class="grey">Who to Follow</h4>
                            <div class="follow-user">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                                <div>
                                    <h5><a href="timeline.html">Diana Amber</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                                <div>
                                    <h5><a href="timeline.html">Cris Haris</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                                <div>
                                    <h5><a href="timeline.html">Brian Walton</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                                <div>
                                    <h5><a href="timeline.html">Olivia Steward</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                                <div>
                                    <h5><a href="timeline.html">Sophia Page</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection