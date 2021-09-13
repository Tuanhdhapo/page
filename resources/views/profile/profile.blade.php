@extends('layouts.app')

@section('content')

    <div class="profile-detail">
        <div class="all-profile">
            <div class="row">
                <div class="profile-left col-xl-3">
                    <div class="all-profile-left">
                        <p class="img-profile"><img class="img-user" src="{{ asset('images/luutrungnghia.png') }}">
                            <button class="potoss" type="submit"><img
                                    src="{{ asset('images/potoss.png') }}"></button>
                        </p>
                        <p class="name-user">Ho Duc Tuan</p>
                        <p class="email-user">Tuanhd@haposoft.com</p>

                        <p class="info-user">
                            <img src="{{ asset('images/birthday-user.png') }}">&ensp;
                            <span>29/5/2000</span>
                        </p>

                        <p class="info-user">
                            <img src="{{ asset('images/phone-user.png') }}">&ensp;
                            <span>0868683715</span>
                        </p>

                        <p class="info-user">
                            <img src="{{ asset('images/home-user.png') }}">&ensp;
                            <span>Cau giay-Ha noi</span>
                        </p>

                        <p class="introduce">
                            Vivamus volutpat eros pulvinar velit laoreet,
                            sit amet egestas erat dignissim. Sed quis rutrum
                            tellus, sit amet viverra felis. Cras sagittis
                            sem sit amet urna feugiat rutrum. Nam nulla
                            ippsumipsum, them venenatis
                        </p>
                    </div>
                </div>

                <div class="profile-right col-xl-9">
                    <p class="my-course">My courses</p>

                    <p class="all-learned">
                        <img class="learned" src="{{ asset('images/slack-mentor.png') }}">
                        <img class="learned" src="{{ asset('images/slack-mentor.png') }}">
                        <button class="add-lesson-button"> <img class="add-lesson"
                                src="{{ asset('images/Vector.png') }}"></button>
                    </p>

                    <p class="my-course">Edit profile</p>

                    <form>
                        <div class="edit-profile">
                            <div class="edit-profile-left">
                                <div>
                                    <label class="label-profile">Name:</label><br>
                                    <input class="input-profile" placeholder="tuan" type="text">
                                </div>

                                <div>
                                    <label class="label-profile">Date of birthday:</label><br>
                                    <input class="input-profile" placeholder="tuan" type="text">
                                </div>

                                <div>
                                    <label class="label-profile">Address:</label><br>
                                    <input class="input-profile" placeholder="tuan" type="text">
                                </div>

                            </div>

                            <div class="edit-profile-right">

                                <div>
                                    <label class="label-profile">Email:</label><br>
                                    <input class="input-profile" placeholder="tuan" type="text">
                                </div>

                                <div>
                                    <label class="label-profile">Phone:</label><br>
                                    <input class="input-profile" placeholder="tuan" type="text">
                                </div>

                                <div>
                                    <label class="label-profile">About me:</label><br>
                                    <textarea name="content" id="content" placeholder="tuan" cols="30" rows="5"
                                        class="form-control
                                            mb-3"></textarea>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
