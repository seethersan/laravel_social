@extends('layouts.app')

@section('title', 'Edit')

@section('content')
    <div class="container">

        <!-- Timeline
        ================================================= -->
        <div class="timeline">
            <div class="timeline-cover">

                <!--Timeline Menu for Large Screens-->
                <div class="timeline-nav-bar hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile-info">
                                @yield('avatar')
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="list-inline profile-menu">
                                <li><a href="#">Timeline</a></li>
                                <li><a href="/persona/{{ $persona->slug }}" class="active">About</a></li>
                                <li><a href="#">Album</a></li>
                                <li><a href="/persona/amigos/{{ $persona->slug }}">Friends</a></li>
                            </ul>
                            <ul class="follow-me list-inline">
                                <li>1,299 people following her</li>
                                <li>
                                @if ($persona->email == $user->email)
                                    <form method="get" action="/persona/{{ $persona->slug }}/edit">
                                        @csrf
                                        <button class="btn-primary">Edit Profile</button>
                                    </form>
                                @else
                                    <form method="post" action="/agregaramigo">
                                        @csrf
                                        <button name="agregarAmigo" class="btn-primary"
                                            @if (in_array(array('amigo_id'=>$persona->email), $amigos))
                                                disabled
                                            @endif value="{{ $persona->slug }}">Add friend</button>
                                    </form>
                                @endif</li>
                            </ul>
                        </div>
                    </div>
                </div><!--Timeline Menu for Large Screens End-->

                <!--Timeline Menu for Small Screens-->
                <div class="navbar-mobile hidden-lg hidden-md">
                    <div class="profile-info">
                        @yield('avatar')
                    </div>
                    <div class="mobile-menu">
                        <ul class="list-inline">
                            <li><a href="#">Timeline</a></li>
                            <li><a href="/persona/{{ $persona->slug }}" class="active">About</a></li>
                            <li><a href="#">Album</a></li>
                            <li><a href="/persona/amigos/{{ $persona->slug }}">Friends</a></li>
                        </ul>
                        @if ($persona->email == $user->email)
                            <form method="post" action="/persona/{{ $persona->slug }}/edit">
                                <button class="btn-primary">Edit Profile</button>
                            </form>
                        @else
                            <form method="post" action="/agregaramigo">
                                <button class="btn-primary">Add friend</button>
                            </form>
                        @endif
                    </div>
                </div><!--Timeline Menu for Small Screens End-->

            </div>
        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    @yield('edit_content')
                </div>
                    <div class="col-md-2 static">
                        <div id="sticky-sidebar">
                            <h4 class="grey">Sarah's activity</h4>
                            <div class="feed-item">
                                <div class="live-activity">
                                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                                    <p class="text-muted">5 mins ago</p>
                                </div>
                            </div>
                            <div class="feed-item">
                                <div class="live-activity">
                                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                                    <p class="text-muted">an hour ago</p>
                                </div>
                            </div>
                            <div class="feed-item">
                                <div class="live-activity">
                                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                                    <p class="text-muted">4 hours ago</p>
                                </div>
                            </div>
                            <div class="feed-item">
                                <div class="live-activity">
                                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                                    <p class="text-muted">a day ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

