<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('backend/assets/css/login.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
      header .container {
    max-width: 82rem;
    margin: 0 auto;
    padding: 0 1rem;
    height: 80px;
    display: flex;
    align-items: flex-end;
}
    </style>

</head>

<body class="dark">
    @extends('layouts.login')


    @section('content')

    <div class="background"></div>
    
    <header>
      <div class="container">
        <ul>
        
          <li>
          <a href="/" class="logo">
               <div class="images">
                <img src="{{ asset('theme/dist/assets/images/pixzel-dark.png') }}" title="Foxeus"/>
              </div>
                </a>
          </li>
      
         
          <li>
            <span class="nav-link theme-toggle">
              <i class="fa-solid fa-sun"></i>
              <i class="fa-solid fa-moon"></i>
            </span>
          </li>
        </ul>
      </div>
    </header>

    <!------------- Main ------------->
    <main>
      <section class="contact">
        <div class="container">
          <!------  Left SIDE  ------>
          <div class="left">
            <div class="form-wrapper">
              <div class="contact-heading">
                <h1>Welcome Guest<span>!</span></h1>
                <p class="text">
                  Sign up to continue
                  
                </p>
              </div>
   

              
                                    
                                        <form class="contact-form" novalidate action="{{ route('register') }}" method="post">
                                            @csrf

                                            <div class="input-wrap w-100">
                                                <input 
                                                type="text" 
                                                class="contact-input" 
                                                id="name" 
                                                name="name"                                          
                                                required/>
                                                <label>Name</label>
                                               
                                            </div>

                                           <div class="input-wrap w-100">        
                                                <input 
                                                type="email" 
                                                class="contact-input" 
                                                id="email" 
                                                name="email" 
                                            
                                                required/>

                                                <label>Email</label>
                                                 <i class="icon fa-solid fa-envelope"></i>
                                                   @error('email')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                               </span>
                                                 @enderror

                                                
                                            </div>

                                           <div class="input-wrap w-100">
                                                <input 
                                                type="password" 
                                                class="contact-input" 
                                                id="password" 
                                                name="password" 
                                                
                                                required/>
                                                <label>Enter Password</label>
                                                <div class="invalid-feedback">
                                                    Please Enter Password
                                                </div>
                                            </div>

                                           <div class="input-wrap w-100">
                                                <input 
                                                type="password" 
                                                class="contact-input" 
                                                id="password_confirmation" 
                                                name="password_confirmation" 
                                                required/>
                                                <label>Confirm Password</label>
                                            </div>

                                          

                                            <div class="contact-buttons">
                                                <button class="btn" type="submit">Register</button>
                                            </div>
                                        </form>


                                        <div class="mt-5 text-center">
                                            <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login</a> </p>
                                        </div>

                                    </div>
                                </div>
  <!-------  Right SIDE  ------>
  <div class="right">
            <!-- Image background -->
            <div class="image-wrapper">
            <img src="{{ asset('landing_assets/images/antonette.jpg') }}" alt="josel" id="test" class="img" /> 
              <!-- Waves 1-->
              <div class="wave-wrap">
                <svg
                  class="wave"
                  viewBox="0 0 783 1536"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    id="wave"
                    d="M236.705 1356.18C200.542 1483.72 64.5004 1528.54 1 1535V1H770.538C793.858 63.1213 797.23 196.197 624.165 231.531C407.833 275.698 274.374 331.715 450.884 568.709C627.393 805.704 510.079 815.399 347.561 939.282C185.043 1063.17 281.908 1196.74 236.705 1356.18Z"
                  />
                </svg>
              </div>
              <!-- Waves 2-->
              <svg
                class="dashed-wave"
                viewBox="0 0 345 877"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  id="dashed-wave"
                  d="M0.5 876C25.6667 836.167 73.2 739.8 62 673C48 589.5 35.5 499.5 125.5 462C215.5 424.5 150 365 87 333.5C24 302 44 237.5 125.5 213.5C207 189.5 307 138.5 246 87C185 35.5 297 1 344.5 1"/>
              </svg>
            </div>

          </div>
        </div>
      </section>
      
    </main>
                           
           

    <script>
    const inputs = document.querySelectorAll(".contact-input");
const toggleBtn = document.querySelector(".theme-toggle");
const allElements = document.querySelectorAll("*");


// for change theme to dark and light
toggleBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark");

    // elements have transition for 1s
    allElements.forEach((el) => {
        el.classList.add("transition");
        setTimeout(() => {
            el.classList.remove("transition");
        }, 1000);
    });
});


// for focus form 
inputs.forEach((ipt) => {
    ipt.addEventListener("focus", () => {
        ipt.parentNode.classList.add("focus");
        ipt.parentNode.classList.add("not-empty");
    });
    ipt.addEventListener("blur", () => {
        if (ipt.value == "") {
            ipt.parentNode.classList.remove("not-empty");
        }
        ipt.parentNode.classList.remove("focus");
    });
});
</script>
    @endsection
</body>
</html>
