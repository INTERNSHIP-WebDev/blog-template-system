@extends('layouts.app2')

@section('content')
<!---
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
</body>--->

<p id="message_error" style="color:red;"></p>
<p id="message_success" style="color:green;"></p>
<form method="post" id="verificationForm">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="number" name="otp" placeholder="Enter OTP" required>
    <br><br>
    <input type="submit" value="Verify">

</form>

<p class="time"></p>

<button id="resendOtpVerification">Resend Verification OTP</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        $('#verificationForm').submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('verifiedOtp') }}",
                type:"POST",
                data: formData,
                success:function(res){
                    if(res.success){
                        alert(res.msg);
                        window.open("/","_self");
                    }
                    else{
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });

        $('#resendOtpVerification').click(function(){
            $(this).text('Wait...');
            var userMail = @json($email);

            $.ajax({
                url:"{{ route('resendOtp') }}",
                type:"GET",
                data: {email:userMail },
                success:function(res){
                    $('#resendOtpVerification').text('Resend Verification OTP');
                    if(res.success){
                        timer();
                        $('#message_success').text(res.msg);
                        setTimeout(() => {
                            $('#message_success').text('');
                        }, 3000);
                    }
                    else{
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });
    });

    function timer()
    {
        var seconds = 30;
        var minutes = 1;

        var timer = setInterval(() => {

            if(minutes < 0){
                $('.time').text('');
                clearInterval(timer);
            }
            else{
                let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

                $('.time').text(tempMinutes+':'+tempSeconds);
            }

            if(seconds <= 0){
                minutes--;
                seconds = 59;
            }

            seconds--;

        }, 1000);
    }

    timer();

</script>

@endsection
