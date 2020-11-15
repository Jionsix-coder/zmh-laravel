@extends('layout')

@section('title', 'Profile')

@section('extra-css')

@endsection

@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>User Information</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ps-section__left">
                            <aside class="ps-widget--account-dashboard">
                                <div class="ps-widget__header"><img src="img/users/3.jpg" alt="">
                                    <figure>
                                        <figcaption>Naing Min Thwin</figcaption>
                                        <p><a href="#">naingminthwin@gmail.com</a></p>
                                    </figure>
                                </div>
                                <div class="ps-widget__content">
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#profile"><i class="icon-user"></i>Profile</a></li>
                                        <li><a href="#invoices"><i class="icon-papers"></i> Orders</a></li>
                                        <li><a href="#whishlist"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#logout"><i class="icon-power-switch"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="ps-tabs col-lg-8">
                        <div class="ps-section__right ps-tab active" id="profile">
                            <form class="ps-form--account-setting" action="index.html" method="get">
                                <div class="ps-form__header">
                                    <br>
                                    <p style="font-size:medium;background-color:black;color:red;font-weight:bold;text-align:center;border-radius: 20px;padding:15px 15px;">အော်ဒါတင်ရရန်အတွက်ဤနေရာတွင်သင့်အချက်အလက်များအားဖြည့်သွင်းပါ(တစ်ကြိမ်သာဖြည့်ညွင်းရန်လိုအပ်ပါသည်။)</p>
                                    <br>
                                    <h3>User Information</h3>
                                </div>
                                <div class="ps-form__content">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" type="text" placeholder="Please enter your phone number...">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <input class="form-control" type="text" placeholder="Please enter your address...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input class="form-control" type="text" placeholder="Please enter your address...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" type="text" placeholder="Please enter your city...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input class="form-control" type="text" placeholder="Please enter your state...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="ps-section__right ps-tab" id="invoices">
                            <br>
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Orders</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="invoice-detail.html">500884010</a></td>
                                                    <td><a href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a></td>
                                                    <td>20-1-2020</td>
                                                    <td>42.99</td>
                                                    <td>Successful delivery</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-detail.html">593347935</a></td>
                                                    <td><a href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a></td>
                                                    <td>20-1-2020</td>
                                                    <td>199.99</td>
                                                    <td>Cancel</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-detail.html">593347935</a></td>
                                                    <td><a href="product-default.html">Xbox One Wireless Controller Black Color</a></td>
                                                    <td>20-1-2020</td>
                                                    <td>199.99</td>
                                                    <td>Cancel</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-detail.html">615397400</a></td>
                                                    <td><a href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a></td>
                                                    <td>20-1-2020</td>
                                                    <td>41.00</td>
                                                    <td>Cancel</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-section__right ps-tab" id="whishlist">
                            <br>
                            <div class="ps-section__content">
                                <div class="table-responsive">
                                    <table class="table ps-table--shopping-cart">
                                        <thead>
                                            <tr>
                                                <th>Product name</th>
                                                <th>PRICE</th>
                                                <th>QUANTITY</th>
                                                <th>TOTAL</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/1.jpg" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="product-default.html">Marshall Kilburn Wireless Bluetooth Speaker, Black (A4819189)</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price">$205.00</td>
                                                <td>
                                                    <div class="form-group--number">
                                                        <button class="up">+</button>
                                                        <button class="down">-</button>
                                                        <input class="form-control" type="text" placeholder="1" value="1">
                                                    </div>
                                                </td>
                                                <td>$205.00</td>
                                                <td><a href="#"><i class="icon-cross"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/clothing/2.jpg" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="product-default.html">Unero Military Classical Backpack</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price">$205.00</td>
                                                <td>
                                                    <div class="form-group--number">
                                                        <button class="up">+</button>
                                                        <button class="down">-</button>
                                                        <input class="form-control" type="text" placeholder="1" value="1">
                                                    </div>
                                                </td>
                                                <td>$205.00</td>
                                                <td><a href="#"><i class="icon-cross"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="ps-section__cart-actions"><a class="ps-btn" href="shop-default.html"><i class="icon-arrow-left"></i> Back to Shop</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection('content')

@section('extra-js')

@endsection