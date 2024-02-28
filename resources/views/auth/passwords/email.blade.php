\@extends('layouts.app2')

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

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
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

        .card-body h3 {
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }


    </style>
</head>

<body>
    <div class="top-section"></div>
    
    <div class="container">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                        


                        <div class="card-container">
                            <div class="card">
                                <div class="card-body text-center">
                                <img width="200" height="200" src="https://img.icons8.com/arcade/200/lock-2.png" alt="lock-2"/>
                                    <br>
                                    <h3>{{ __('Reset Password') }}</h3>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="row mb-5">
                                                <label for="email" class="col-md-3 col-form-label">{{ __('Email Address:') }}</label>
                                                <div class="col-md-7">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Send Password Reset Link') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

            <div class="col-3">
            </div>

            </div>

        </div>
    </div>
</body>
@endsection
