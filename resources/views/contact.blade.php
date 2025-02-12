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
                            <li class="breadcrumb-item active">Contact {{ucwords($settings->name)}}</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- Page Conttent -->
        <main class="page-content section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="contact-form">
                            <div class="contact-form-info">
                                <div class="contact-title">
                                    <h3>Reach Out</h3>
                                    @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        <strong class="text-success">{{Session::get("success")}}</strong>
                                    </div>
                                    @endif
                                </div>
                                <form  action="{{url("/processcontact")}}" method="post">
                                    @csrf
                                    <div class="contact-page-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="name" type="text" placeholder="Name *" required
                                                >
                                            </div>
                                            <div class="contact-inner">
                                                <input name="email" type="email" placeholder="Email *" required>
                                            </div>
                                            <div class="contact-inner">
                                                <input name="phone" type="text" placeholder="Phone *" required>
                                            </div>
                                            <div class="contact-inner">
                                                <input name="subject" type="text" placeholder="Subject *" required>
                                            </div>
                                            <div class="contact-inner contact-message">
                                                <textarea name="message" placeholder="Message *" required></textarea>
                                            </div>
                                        </div>
                                        <div class="contact-submit-btn">
                                            <button class="submit-btn" type="submit">Send Email</button>
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="contact-infor">
                            <div class="contact-title">
                                <h3>CONTACT US</h3>
                            </div>
                            <div class="contact-dec">
                                <p>Reach out to us</p>
                            </div>
                            <div class="contact-address">
                                <ul>
                                    <li>Address : {{$settings->address}}</li>
                                    <li>Email: {{$settings->email}}/li>
                                    <li>Phone: {{$settings->phone}}</li>
                                    <li>WhatsApp : <a href="https://wa.me/{{$settings->whatsapp}}" style="color:green;">Chat on whatsapp</a></li>
                                </ul>
                            </div>
                            <div class="work-hours">
                                <h5>Working hours</h5>
                                <p><strong>Monday &ndash; Sunday</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--// Page Conttent -->

@include("layouts.page_footer")
@endsection