@extends('front.master')
@section('class-name','create')
@section('content')


    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <a
                                href="{{ url('register') }}">انشاء حساب جديد</a> </li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">

                {!! Form::open(['url' => 'register']) !!}

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'الاسم']) !!}
                </div>

                <div class="form-group">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'البريد الالكتروني'])
                    !!}
                </div>

                <div class="form-group">
                    {!! Form::date('d_o_b', null, ['class' => 'form-control', 'placeholder' => 'تاريخ الميلاد']) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('blood_type_id', $bloodTypes->pluck('name', 'id'), null, ['class' =>
                    'form-control', 'placeholder'
                    => 'فصيلة الدم']) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('governorate_id', $governorates->pluck('name', 'id'), null, ['class' =>
                    'form-control', 'placeholder' =>
                    'المحافظة'])
                    !!}
                </div>

                <div class="form-group">
                    {!! Form::select('city_id', $cities->pluck('name', 'id'), null, ['class' => 'form-control',
                    'placeholder' => 'المدينه'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'رقم الهاتف'])
                    !!}
                </div>

                <div class="form-group">
                    {!! Form::date('last_donation_rate', null, ['class' =>
                    'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'كلمه المرور']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'تاكيد كلمه المرور']) !!}
                </div>



                <style>
                    .create-btn {
                        background-color: green;
                        color: white;
                        /* يمكنك إضافة أي تنسيق إضافي للزرار هنا */
                    }
                </style>

                <div class="form-group text-center">
                    {!! Form::submit('انشاء', ['class' => 'create-btn']) !!}
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
 @endsection


