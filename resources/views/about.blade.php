@extends("layouts.page_header")
@section("content")


 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- Page Conttent -->
        <main class="about-us-page section-ptb">
            
            <div class="about-us_area section-pb">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-us_img">
                                <img src="{{asset('pageassets/images/banner/about-us_bg.jpg')}}" alt="About Us Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-us_content">
                                <h3 class="heading mb-20">About {{ucwords($settings->name)}}</h3>
                                <p class="short-desc mb-20">
                                   {{$settings->about}}
                                </p>
                                <div class="munoz-btn-ps_left slide-btn">
                                    <a class="btn" href="{{url("/products")}}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonials-area bg-gray section-ptb">
            
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class=" testimonials-area">
                                <div class="row testimonial-two">
                                    <div class="col-lg-6 m-auto">
                                        <div class="testimonial-wrap-two text-center">
                                            <div class="quote-container">
                                                <div class="quote-image">
                                                    <img src="{{asset('pageassets/images/testimonial/testimonial-01.jpg')}}" alt="">
                                                </div>
                                                <div class="author">
                                                    <h6>Niloba Khan</h6>
                                                    <p>CEO of Hasbar</p>
                                                </div>
                                                <div class="testimonials-text">
                                                    <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 m-auto">
                                        <div class="testimonial-wrap-two text-center">
                                            <div class="quote-container">
                                                <div class="quote-image">
                                                    <img src="{{asset('pageassets/images/testimonial/testimonial-02.jpg')}}" alt="">
                                                </div>
                                                <div class="author">
                                                    <h6>Devite oni</h6>
                                                    <p>CEO of SunPark</p>
                                                </div>
                                                <div class="testimonials-text">
                                                    <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 m-auto">
                                        <div class="testimonial-wrap-two text-center">
                                            <div class="quote-container">
                                                <div class="quote-image">
                                                    <img src="{{asset('pageassets/images/testimonial/testimonial-01.jpg')}}" alt="">
                                                </div>
                                                <div class="author">
                                                    <h6>Kathy Young</h6>
                                                    <p>CEO of SunPark</p>
                                                </div>
                                                <div class="testimonials-text">
                                                    <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </main>
        <!--// Page Conttent -->

        

@include("layouts.news_letter")
@include("layouts.page_footer")
@endsection