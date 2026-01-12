@extends('frontend.layouts.master')
@section('title', 'About Us')
@section('content')
    <main class="main about">
        <div class="page-header page-header-bg text-left"
            style="background: 50%/cover #D4E1EA url('assets/images/page-header-bg.jpg');">
            <div class="container">
                <h1><span class="font-size: 22px;">ABOUT US</span>
                  <br>   OUR COMPANY</h1>
                <a href="#" class="btn btn-dark">Contact</a>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="about-section">
            <div class="container">
                <h2 class="subtitle">OUR STORY</h2>
                <p>Founded in 2015, our company has been committed to delivering high-quality products and exceptional
                    customer service to clients worldwide. With a passion for innovation and excellence, we specialize in
                    offering a wide range of fashion, lifestyle, and technology products that cater to diverse customer
                    needs. Our team of dedicated professionals works tirelessly to ensure every product meets the highest
                    standards of quality, style, and sustainability.</p>

                <p>At our core, we believe in building lasting relationships with our customers by providing transparent,
                    reliable, and personalized service. We continuously strive to improve our offerings, embrace
                    cutting-edge trends, and adapt to the evolving market to bring the best experience to our clients.</p>

                <p class="lead">“Our mission is to make quality and style accessible to everyone, while maintaining
                    integrity, trust, and a customer-first approach in everything we do.”</p>

            </div><!-- End .container -->
        </div><!-- End .about-section -->

        <div class="features-section bg-gray pt-5 mt-5">
            <div class="container">
                <h2 class="subtitle">WHY CHOOSE US</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="feature-box bg-white">
                            <i class="icon-shipped"></i>

                            <div class="feature-box-content p-0">
                                <h3>Free Shipping</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industr.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-lg-4">
                        <div class="feature-box bg-white">
                            <i class="icon-us-dollar"></i>

                            <div class="feature-box-content p-0">
                                <h3>100% Money Back Guarantee</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industr.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-lg-4">
                        <div class="feature-box bg-white">
                            <i class="icon-online-support"></i>

                            <div class="feature-box-content p-0">
                                <h3>Online Support 24/7</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industr.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .features-section -->

        <div class="testimonials-section pt-5 mt-3">
            <div class="container">
                <h2 class="subtitle text-center">HAPPY CLIENTS</h2>

                <div class="testimonials-carousel owl-carousel owl-theme images-left"
                    data-owl-options="{
                'margin': 20,
                'lazyLoad': true,
                'autoHeight': true,
                'dots': false,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '992': {
                        'items': 2
                    }
                }
            }">
                    <div class="testimonial">
                        <div class="testimonial-owner">
                            <figure>
                                <img src="assets/images/clients/client1.png" alt="client">
                            </figure>

                            <div>
                                <strong class="testimonial-title">John Smith</strong>
                                <span>SMARTWAVE CEO</span>
                            </div>
                        </div><!-- End .testimonial-owner -->

                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                                dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                        </blockquote>
                    </div><!-- End .testimonial -->

                    <div class="testimonial">
                        <div class="testimonial-owner">
                            <figure>
                                <img src="assets/images/clients/client2.png" alt="client">
                            </figure>

                            <div>
                                <strong class="testimonial-title">Bob Smith</strong>
                                <span>SMARTWAVE CEO</span>
                            </div>
                        </div><!-- End .testimonial-owner -->

                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                                dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                        </blockquote>
                    </div><!-- End .testimonial -->

                    <div class="testimonial">
                        <div class="testimonial-owner">
                            <figure>
                                <img src="assets/images/clients/client1.png" alt="client">
                            </figure>

                            <div>
                                <strong class="testimonial-title">John Smith</strong>
                                <span>SMARTWAVE CEO</span>
                            </div>
                        </div><!-- End .testimonial-owner -->

                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                                dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                        </blockquote>
                    </div><!-- End .testimonial -->
                </div><!-- End .testimonials-slider -->
            </div><!-- End .container -->
        </div><!-- End .testimonials-section -->

        <div class="counters-section bg-gray pt-5 mt-3">
            <div class="container">
                <div class="row  text-center justify-content-between">
                    <div class="col count-container">
                        <div class="count-wrapper">
                            <span class="count-to" data-from="0" data-to="200" data-speed="2000"
                                data-refresh-interval="50">200+</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">MILLION CUSTOMERS</h4>
                    </div><!-- End .col-md-4 -->

                    <div class="col count-container">
                        <div class="count-wrapper">
                            <span class="count-to" data-from="0" data-to="1800" data-speed="2000"
                                data-refresh-interval="50">1800+</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">TEAM MEMBERS</h4>
                    </div><!-- End .col-md-4 -->

                    <div class="col count-container">
                        <div class="count-wrapper line-height-1">
                            <span class="count-to" data-from="0" data-to="24" data-speed="2000"
                                data-refresh-interval="50">24 HR</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">SUPPORT AVAILABLE</h4>
                    </div><!-- End .col-md-4 -->

                    <div class="col count-container">
                        <div class="count-wrapper">
                            <span class="count-to" data-from="0" data-to="265" data-speed="2000"
                                data-refresh-interval="50">265+</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">SUPPORT AVAILABLE</h4>
                    </div><!-- End .col-md-4 -->

                    <div class="col count-container">
                        <div class="count-wrapper line-height-1">
                            <span class="count-to" data-from="0" data-to="99" data-speed="2000"
                                data-refresh-interval="50">99%</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">SUPPORT AVAILABLE</h4>
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .counters-section -->
    </main><!-- End .main -->
@endsection
