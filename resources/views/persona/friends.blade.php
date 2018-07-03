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
    <div class="friend-list">
        <div class="row">
            @foreach($friends as $friend)
                <div class="col-md-6 col-sm-6">
                    <div class="friend-card">
                        <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                        <div class="card-info">
                            <img @if ($friend->avatar == "")
                                    src="http://placehold.it/300x300" alt=""
                                 @else
                                    src="{{ asset('/images/avatar/'.$friend->avatar) }}" alt="{{ $friend->firstname." ".$friend->lastname }}"
                                 @endif class="profile-photo-lg" />
                            <div class="friend-info">
                                <a href="/persona/{{ $friend->slug }}" class="pull-right text-green">My Friend</a>
                                <h5><a href="/persona/{{ $friend->slug }}" class="profile-link">{{ $friend->firstname." ".$friend->lastname }}</a></h5>
                                <p>Student at Harvard</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection