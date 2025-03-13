@extends('layouts.app')

@section('title', 'Home - ' . config('app.name'))

@section('content')
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a>view all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{ asset('assets/images/product_01.jpg') }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>Tittle goes here</h4></a>
                            <h6>$25.75</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (24)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{ asset('assets/images/product_02.jpg') }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>Tittle goes here</h4></a>
                            <h6>$30.25</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (21)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{ asset('assets/images/product_03.jpg') }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>Tittle goes here</h4></a>
                            <h6>$20.45</h6>
                            <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (36)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{ asset('assets/images/product_04.jpg') }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>Tittle goes here</h4></a>
                            <h6>$15.25</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (48)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{ asset('assets/images/product_05.jpg') }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>Tittle goes here</h4></a>
                            <h6>$12.50</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (16)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{ asset('assets/images/product_06.jpg') }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>Tittle goes here</h4></a>
                            <h6>$22.50</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (32)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About {{ config('app.name') }}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Looking for the best products?</h4>
                        <p>Discover our collection of premium products at the best prices. We offer a wide range of options to suit your needs.</p>
                        <ul class="featured-list">
                            <li><a href="#">Premium Quality Products</a></li>
                            <li><a href="#">Fast Delivery</a></li>
                            <li><a href="#">Secure Payment</a></li>
                            <li><a href="#">24/7 Support</a></li>
                            <li><a href="#">Satisfaction Guaranteed</a></li>
                        </ul>
                        <a  class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="{{ asset('assets/images/feature-image.jpg') }}" alt="Feature Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 