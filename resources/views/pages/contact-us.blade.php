@extends('layout')

@section('title', 'Contact')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-page--single" id="contact-us">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <div id="contact-map" data-address="17 Queen St, Southbank, Melbourne 10560, Australia" data-title="Funiture!" data-zoom="17" style="margin:10px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.8230750212094!2d96.17176295817036!3d16.794271364918924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed966a05c831%3A0x7d26fd23b3d59bdc!2sZay%20Min%20Htet%20Company%20Limited!5e0!3m2!1sen!2smm!4v1603275135274!5m2!1sen!2smm" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="ps-contact-info">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Contact Us For Any Questions</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Contact Directly</h4>
                                <p><a href="mailto:zayminhtetcompanylimited.com">zayminhtetcompanylimited@gmail.com</a><span>+95-9-898155551</span></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Head Quater</h4>
                                <p><span>အမှတ်(၂၀၀/၂၀၆),(၉)လွှာ,၁၃၄လမ်းနှင့်၁၃၅လမ်းကြား,စက်ရုံလမ်း,မအူကုန်းရပ်ကွက်,တာမွေမြို့နယ်,ရန်ကုန်တိုင်းဒေသကြီး.</span></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Work With Us</h4>
                                <p><span>Send your CV to our email:</span><a href="#">career@martfury.com</a></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Customer Service</h4>
                                <p><a href="#">customercare@martfury.com</a><span>(800) 843-2446</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-contact-form">
            <div class="container">
                <form class="ps-form--contact-us" action="index.html" method="get">
                    <h3>Get In Touch</h3>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name *">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Subject *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group submit">
                        <button class="ps-btn">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection