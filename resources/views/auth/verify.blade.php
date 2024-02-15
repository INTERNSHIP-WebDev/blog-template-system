@extends('layouts.app2')

@section('content')
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>
    .top-section {
        background: linear-gradient(135deg, #FFA500, #FF0000);
        height: 30vh; 
    }
    
    .bottom-section {
        background-color: #FFFFFF; 
        height: 70vh; 
        width: 70vh; 
    }

    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 50%;
        left: 50%;
        max-width: 400px; 
        max-height: 400px;
        transform: translate(-50%, -50%);
    }

    .card {
        width: 100%;
        height: 100%;
        background-color: #FFFFFF; 
        padding: 20px; 
        border-radius: 10px; 
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
    }

    .card-body h1 {
        font-weight: bold;
        font-family: 'Poppins', sans-serif;
    }
</style>
</head>
<body>
    <div class="top-section"></div>
    
        <div class="container">
            <div class="row">
                <div class="card-container">
                    <div class="card">
                        <div class="card-body text-center">
                           
                        <img width="200" height="200" src="https://img.icons8.com/bubbles/200/new-post.png" alt="new-post"/>
                            <br>
                            <h1>Check Email</h1>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
