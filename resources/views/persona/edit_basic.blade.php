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

        <!-- Basic Information
        ================================================= -->
        <div class="edit-profile-container">
            <div class="block-title">
                <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
                <div class="line"></div>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                <div class="line"></div>
            </div>
            <div class="edit-block">
                <form name="edit_form" method="post" action="/persona/{{ $persona->slug }}" id="edit_form" class="form-inline"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="firstname">First name</label>
                            <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name" value="{{ $persona->firstname }}" />
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="lastname" class="">Last name</label>
                            <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name" value="{{ $persona->lastname }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="email">My email</label>
                            <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="My Email" value="{{ $persona->email }}" disabled/>
                        </div>
                    </div>
                    <div class="row">
                        <p class="custom-label"><strong>Date of Birth</strong></p>
                        <div class="form-group col-sm-3 col-xs-6">
                            <label for="day" class="sr-only"></label>
                            <select class="form-control" id="day" name="day">
                                <option value="Day">Day</option>
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}"
                                    @if ($i == old('day', date('d', $date)))
                                            selected="selected"
                                    @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-6">
                            <label for="month" class="sr-only"></label>
                            <select class="form-control" id="month" name ="month">
                                <option value="month" disabled selected>Month</option>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}"
                                            @if ($i == old('month', date('m', $date)))
                                            selected="selected"
                                            @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="year" class="sr-only"></label>
                            <select class="form-control" id="year" name="year">
                                <option value="year" disabled selected>Year</option>
                                @for($i = 1900; $i <= 2018; $i++)
                                    <option value="{{ $i }}"
                                            @if ($i == old('year', date('Y', $date)))
                                            selected="selected"
                                            @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group gender">
                        <span class="custom-label"><strong>I am a: </strong></span>
                        <label class="radio-inline">
                            <input type="radio" name="male"
                                   @if ("Male" == old('male', $persona->gender))
                                   checked
                                    @endif>Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="female"
                                   @if ("Female" == old('female', $persona->gender))
                                   checked
                                    @endif>Female
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="city"> My city</label>
                            <input id="city" class="form-control input-group-lg" type="text" name="city" title="Enter city" placeholder="Your city" value="{{ $persona->city }}"/>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="country">My country</label>
                            <select class="form-control" id="country" name="country">
                                @foreach($items as $item)
                                    <option value="{{ $item->codigo }}"
                                    @if ($item->codigo == old('country', $persona->pais))
                                            selected="selected"
                                    @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="my-info">About me</label>
                            <textarea id="my-info" name="information" class="form-control" placeholder="Some texts about me" rows="4" cols="400">{{ $persona->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="avatar">Avatar</label>
                            <input id="avatar" name="avatar" type="file">
                        </div>
                    </div>
                    <button class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
@endsection