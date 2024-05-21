@extends('front.master')
@section('class-name','signin-account')
@section('content')

<!--form-->
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                </ol>
            </nav>
        </div>
        <div class="signin-form">

            <form method="post" action="{{ url('login') }}">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="logo">
                    <img src="{{ asset('front/imgs/logo.png') }}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="الايميل">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                        placeholder="كلمة المرور">
                </div>
                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img src="{{ asset('front/imgs/complain.png') }}">
                        <a href="#">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <button type="submit" class="btn btn-primary">دخول</button>
                    </div>
                    <div class="col-md-6 left">
                        <a href="{{ url('register-form') }}" class="btn btn-secondary">انشاء حساب جديد</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
