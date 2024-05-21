@extends('front.master')
@section('class-name','contact-us')
@section('content')



<!--contact-us-->
<div class="contact-now">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                </ol>
            </nav>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row methods">
            <div class="col-md-6">
                <div class="call">
                    <div class="title">
                        <h4>اتصل بنا</h4>
                    </div>
                    <div class="content">
                        <div class="logo">
                            <img src="{{ asset('front/imgs/logo.png') }}">
                        </div>
                        <div class="details">
                            <ul>
                                <li><span>الجوال:</span> <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></li>
                               <li><span>فاكس:</span> <a href="tel:234234234" >234234234</a></li>
                                <li><span>البريد الإلكتروني:</span> <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                            </ul>
                        </div>
                        <div class="social">
                            <h4>تواصل معنا</h4>
                            <div class="icons" dir="ltr">
                                <div class="out-icon">
                                    <a href="{{ $settings->facebook_link }}"><img src="{{ asset('front/imgs/001-facebook.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->twitter_link }}"><img src="{{ asset('front/imgs/002-twitter.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->youtube_link }}"><img src="{{ asset('front/imgs/003-youtube.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->instagram_link }}"><img src="{{ asset('front/imgs/004-instagram.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->whatsapp_link }}"><img src="{{ asset('front/imgs/005-whatsapp.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->google_plus_link }}"><img src="{{ asset('front/imgs/006-google-plus.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <div class="title">
                        <h4>تواصل معنا</h4>
                    </div>
                    <div class="fields">
                        <form method="POST" action="{{ url('store-messege') }}">
                            @csrf
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم"
                                name="name">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="البريد الإلكترونى" name="email">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال"
                                name="phone">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="عنوان الرسالة" name="subject">
                            <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1"
                                rows="3" name="messege"></textarea>
                            <button type="submit">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
