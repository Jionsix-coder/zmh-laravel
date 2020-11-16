@extends('product-layout')

@section('title', 'Commming Soon')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-page--comming-soon">
        <div class="container">
            <div class="ps-page__header"><a class="ps-logo" href="index.html"><img src="img/coming-soon-logo.png" alt=""></a>
                <h1> Coming Soon</h1>
                <p>Condimentum ipsum a adipiscing hac dolor set consectetur urna commodo elit parturient</p><a>molestie ut nisl partu convallier ullamcorpe.</a>
            </div>
            <div class="ps-page__content"><img src="img/coming-soon.jpg" alt="">
                <figure>
                    <figcaption>NEW STORE WE BE LAUNCHED IN:</figcaption>
                    <ul class="ps-countdown" data-time="July 21, 2020 15:37:25">
                        <li><span class="days"></span>
                            <p>Days</p>
                        </li>
                        <li><span class="hours"></span>
                            <p>Hours</p>
                        </li>
                        <li><span class="minutes"></span>
                            <p>Minutes</p>
                        </li>
                        <li><span class="seconds"></span>
                            <p>Second</p>
                        </li>
                    </ul>
                </figure>
            </div>
            <div class="ps-page__footer">
                <ul class="ps-list--social">
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
    