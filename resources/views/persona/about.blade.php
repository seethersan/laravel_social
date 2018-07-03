@extends('layouts.edit')

@section('avatar')
    <img @if ($persona->avatar == "")
            src="http://placehold.it/300x300" alt=""
        @else
            src="{{ asset('/images/avatar/'.$persona->avatar) }}" alt="{{ $persona->firstname." ".$persona->lastname }}"
        @endif class="img-responsive profile-photo" />
    <h3>{{ $persona->firstname." ".$persona->lastname }}</h3>
    <p class="text-muted">{{ $persona->smalldesc }}</p>
@endsection

@section('edit_content')
    <div class="about-profile">
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
            <p>{{ $persona->description }}</p>
        </div>
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
            <div class="organization">
                <img src="images/envato.png" alt="" class="pull-left img-org" />
                <div class="work-info">
                    <h5>Envato</h5>
                    <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                </div>
            </div>
            <div class="organization">
                <img src="images/envato.png" alt="" class="pull-left img-org" />
                <div class="work-info">
                    <h5>Envato</h5>
                    <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                </div>
            </div>
            <div class="organization">
                <img src="images/envato.png" alt="" class="pull-left img-org" />
                <div class="work-info">
                    <h5>Envato</h5>
                    <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                </div>
            </div>
        </div>
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
            <p>{{ $persona->city }}</p>
            <div class="google-maps">
                <div id="map" class="map"></div>
            </div>
        </div>
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
            <ul class="interests list-inline">
                <li><span class="int-icons" title="Bycycle riding"><i class="icon ion-android-bicycle"></i></span></li>
                <li><span class="int-icons" title="Photography"><i class="icon ion-ios-camera"></i></span></li>
                <li><span class="int-icons" title="Shopping"><i class="icon ion-android-cart"></i></span></li>
                <li><span class="int-icons" title="Traveling"><i class="icon ion-android-plane"></i></span></li>
                <li><span class="int-icons" title="Eating"><i class="icon ion-android-restaurant"></i></span></li>
            </ul>
        </div>
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
            <ul>
                <li><a href="">Russian</a></li>
                <li><a href="">English</a></li>
            </ul>
        </div>
    </div>
@endsection