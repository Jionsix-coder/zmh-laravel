@extends('layout')

@section('title', 'Cart')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li>Shopping Cart</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Shopping Cart</h1>
                </div>
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
                    <div class="ps-section__cart-actions"><a class="ps-btn" href="shop-default.html"><i class="icon-arrow-left"></i> Back to Shop</a></div>
                </div>
                <div class="ps-section__footer">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <figure>
                                <figcaption>Coupon Discount</figcaption>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="ကူပွန်ကုဒ်ရိုက်ထည့်ရန်နေရာ">
                                </div>
                                <div class="form-group">
                                    <button class="ps-btn ps-btn--outline">Apply</button>
                                </div>
                            </figure>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shopping-total">
                                <div class="ps-block__header">
                                    <p>အရေအတွက်စုစုပေါင်း <span> $683.49</span></p>
                                </div>
                                <div class="ps-block__header">
                                    <p style="color: red;">လက်ကျန်ငွေ <span> $683.49</span></p>
                                </div>
                                <div class="ps-block__header">
                                    <p>တစ်လချင်းပေးရမည့်ငွေ <span> $683.49</span></p>
                                </div>
                                <div class="ps-block__content">
                                    <h3>စုစုပေါင်း  <span>$683.49</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <figure>
                                <figcaption>တာဝန်ခံကုဒ်</figcaption>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="တာဝန်ခံကုဒ်ရိုက်ထည့်ရန်နေရာ">
                                </div>
                            </figure>
                            <a class="ps-btn ps-btn--fullwidth" href="checkout.html">အော်ဒါတင်ရန်</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection