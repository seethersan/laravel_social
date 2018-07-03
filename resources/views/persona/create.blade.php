@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div id="lp-register">
        <div class="container wrapper">
            <div class="row">
                <div class="col-sm-5">
                    <div class="intro-texts">
                        <h1 class="text-white">Make Cool Friends !!!</h1>
                        <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
                        <button class="btn btn-primary">Learn More</button>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="reg-form-container">

                        <!-- Register/Login Tabs-->
                        <div class="reg-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                                <li><a href="#login" data-toggle="tab">Login</a></li>
                            </ul><!--Tabs End-->
                        </div>

                        <!--Registration Form Contents-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="register">
                                <h3>Register Now !!!</h3>
                                <p class="text-muted">Be cool and join today. Meet millions</p>

                                <!--Register Form-->
                                <form name="registration_form" method="POST" action="/persona" id='registration_form' class="form-inline">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="firstname" class="sr-only">First Name</label>
                                            <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name"/>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="lastname" class="sr-only">Last Name</label>
                                            <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="email" class="sr-only">Email</label>
                                            <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Your Email"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="password" class="sr-only">Password</label>
                                            <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="birth"><strong>Date of Birth</strong></p>
                                        <div class="form-group col-sm-3 col-xs-6">
                                            <label for="month" class="sr-only"></label>
                                            <select class="form-control" id="day" name="day">
                                                <option value="Day" disabled selected>Day</option>
                                                @for($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3 col-xs-6">
                                            <label for="month" class="sr-only"></label>
                                            <select class="form-control" id="month" name="month">
                                                <option value="month" disabled selected>Month</option>
                                                @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="year" class="sr-only"></label>
                                            <select class="form-control" id="year" name="year">
                                                <option value="year" disabled selected>Year</option>
                                                @for($i = 1900; $i <= 2018; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group gender">
                                        <label class="radio-inline">
                                            <input type="radio" name="male" checked>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="female">Female
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city" class="sr-only">City</label>
                                            <input id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Enter city" placeholder="Your city"/>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="country" class="sr-only"></label>
                                            <select class="form-control" id="country" name="country">
                                                @foreach($items as $item)
                                                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <p><a href="#">Already have an account?</a></p>
                                    <button class="btn btn-primary">Register Now</button>
                                </form><!--Register Now Form Ends-->
                            </div><!--Registration Form Contents Ends-->

                            <!--Login-->
                            <div class="tab-pane" id="login">
                                <h3>Login</h3>
                                <p class="text-muted">Log into your account</p>

                                <!--Login Form-->
                                <form name="Login_form" id='Login_form' method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="email" class="sr-only">Email</label>
                                            <input id="email" class="input-group-lg form-control{{ $errors->has('email') ? ' has-error' : '' }}" value="{{ old('email') }}" type="email" name="email" title="Enter Email" placeholder="Your Email"/>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            @if (session()->has('flash'))
                                                <div class="alert alert-info">{{ session('flash') }}</div>
                                            @endif
                                            <label for="password" class="sr-only">Password</label>
                                            <input id="password" class="input-group-lg form-control{{ $errors->has('password') ? ' has-error' : '' }}" type="password" name="password" title="Enter password" placeholder="Password"/>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <p><a href="#">Forgot Password?</a></p>
                                    <button class="btn btn-primary">Login Now</button>
                                </form><!--Login Form Ends-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">

                    <!--Social Icons-->
                    <ul class="list-inline social-icons">
                        <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
        <div class="spinner"></div>
    </div>
@endsection