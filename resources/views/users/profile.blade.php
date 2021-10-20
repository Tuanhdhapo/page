@extends('layouts.app')

@section('content')
    <section class="container-fluid profile-container">
        <form class="row main-profile" action="profile/edit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-3 profile align-self-center">
                <div class="avatar-user row justify-content-md-center">
                    @if (isset($users->img_path))
                        <img src="{{ asset('storage/avatar_user/' . $users->img_path) }}" alt="ava-user">
                        <i class="fas fa-camera icon-upload-ava" id="icon-upload-ava"></i>
                        <input type="file" name="favauser" class="input-upload-ava" id="input-upload-ava">
                    @else
                        <img src="{{ asset('images/ava_teacher.jpg') }}" alt="ava-user">
                        <i class="fas fa-camera icon-upload-ava" id="icon-upload-ava"></i>
                        <input type="file" name="favauser" class="input-upload-ava" id="input-upload-ava">
                    @endif
                </div>
                <div class="profile-user row justify-content-md-center">
                    <div class="name-user col align-self-center">{{ $users->name }}</div>
                    <div class="email-user col align-self-center">{{ $users->email }}</div>
                </div>
                <hr>
                <div class="description-user">
                    <img src="{{ asset('images/birthday-user.png') }}" alt="phone icon">
                    <p class="txt-user">{{ $birthday }}</p>
                </div>
                <hr>
                <div class="description-user">
                    <img src="{{ asset('images/phone-user.png') }}" alt="phone icon">
                    <p class="txt-user">{{ $users->phone }}</p>
                </div>
                <hr>
                <div class="description-user">
                    <img src="{{ asset('images/home-user.png') }}" alt="adress icon">
                    <p class="txt-user">{{ $users->address }}</p>
                </div>
                <hr>
                <div class="about-user-profile">
                    <p>{{ $users->about }}</p>
                </div>

            </div>
            <div class="col-lg-8 edit-profile-container">
                <div class="txt-my-profile">
                    <p>My Profile</p>
                </div>
                <div class="img-your-courses  d-flex  justify-content-md-center">
                    @foreach ($courses as $course)
                        <div class="img-your-course">
                            <img  src="{{ asset($course->img_path) }}" alt="{{ $course->title }}">
                        </div>
                    @endforeach
                    <div class="img-your-course">
                        <a href="{{route('courses')}}">
                            <img class="img_add" src="{{ asset('images/add_course.png') }}" alt="img_add">
                        </a>
                    </div>
                </div>
                <div class="txt-my-profile">
                    <p>Edit profile</p>
                </div>
                <div class="edit-profile-input">
                    <input type="hidden" name="fid" value="{{ $users->id }}">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <p class="edit-input-label">Name:</p>
                            <input type="text" id="fname" class="form-control edit-input-profile" name="fname"
                                placeholder="Your name..." value="{{ $users->name }}">
                        </div>
                        <div class="col-lg-6">
                            <p class="edit-input-label">Email:</p>
                            <input type="text" id="femail" class="form-control edit-input-profile" name="femail"
                                placeholder="Your email..." value="{{ $users->email }}">
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col-lg-6">
                            <p class="edit-input-label">Date of birthday:</p>
                            <input placeholder="Select date" type="text" id="datepicker"
                                class="form-control edit-input-profile datepicker" name="fbirth" value="{{ $users->birthday }}">
                        </div>
                        <div class="col-lg-6">
                            <p class="edit-input-label">Phone:</p>
                            <input type="text" id="fphone" class="form-control edit-input-profile" name="fphone"
                                placeholder="Your phone number..." value="{{ $users->phone }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <p class="edit-input-label">Address:</p>
                            <input type="text" id="fadress" class="form-control edit-input-profile" name="faddress"
                                placeholder="Your address..." value="{{ $users->address }}">
                        </div>
                        <div class="col-lg-6">
                            <p class="edit-input-label">About me:</p>
                            <textarea id="fabout" class="form-control edit-input-profile" name="fabout"
                                placeholder="Your about me..." rows="5">{{ $users->about }}</textarea>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6">
                            <input class="btn-save-profile" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
