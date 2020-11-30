@extends('layout')

@section('title', 'About Us')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--single" id="about-us"><img src="img/bg/about-us.jpg" alt="">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    <h4>Welcome to Zay Min Htet Co.,Ltd</h4>
                    <h3>4 months installment Online Shopping</h3>
                    <p>For only authorzied members</p>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-cube"></i>
                                <h4>{{ $products->count() }}</h4>
                                <p>Product for sale</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-store"></i>
                                <h4>{{ $users->count() }}</h4>
                                <p>Members on Zay Min Htet Co.,Ltd</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-bag2"></i>
                                <h4>{{ $users->count() }}</h4>
                                <p>Buyer active on Zay Min Htet Co.,Ltd</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-cash-dollar"></i>
                                <h4>$2.46M</h4>
                                <p>Annual gross merchandise sales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--include ../../partials/pages/about-us/milestone-->
        <div class="ps-our-team">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Meet Our Leaders</h3>
                </div>
                <div class="ps-section__content">
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/1.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/2.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/3.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/4.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/5.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/6.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure>
                        <div class="ps-block--ourteam"><img src="img/users/our-team/7.jpg" alt="">
                            <div class="ps-block__content">
                                <h4>Robert Downey Jr</h4>
                                <p>CEO Fouder</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </figure>
                    <figure data-mh="our-team">
                        <div class="ps-block--ourteam blank"><a href="#">Become <br> member in <br> team</a></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection