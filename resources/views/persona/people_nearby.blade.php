@extends('layouts.newsfeed')

@section('avatar')
    <img @if ($persona->avatar == "")
            src="http://placehold.it/300x300" alt=""
         @else
            src="{{ asset('/images/avatar/'.$persona->avatar) }}" alt="{{ $persona->firstname." ".$persona->lastname }}"
         @endif class="img-responsive profile-photo" />
    <h3><a href="/persona/{{ $persona->slug }}" class="text-white">{{ $persona->firstname." ".$persona->lastname }}</a></h3>
    <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
@endsection

@section('people_nearby_content')
    <!-- Nearby People List
            ================================================= -->
    <div class="people-nearby">
        <div class="google-maps">
            <div id="map" class="map"></div>
        </div>
        <form name="add_friends" method="post" action="/agregaramigo">
            @csrf
        @foreach($persons as $person)
            <div class="nearby-user">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <img href="{{ asset( $person->avatar) }}" alt="{{ $person->firstname }}" class="profile-photo-lg" />
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h5><a href="/persona/{{ $person->slug }}" class="profile-link">{{ $person->firstname." ".$person->lastname }}</a></h5>
                        <p>{{ $person->smalldesc }}</p>
                        <p class="text-muted">500m away</p>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <button name="agregarAmigo" class="btn btn-primary pull-right" value="{{ $person->slug }}"
                                @if (in_array(array('amigo_id'=>$person->email), $amigos))
                                    disabled
                                @endif>Add Friend</button>
                        @if (session()->has('flash') && old('agregarAmigo') == $person->slug)
                            <div class="alert alert-info">{{ session('flash') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </form>
    </div>
@endsection