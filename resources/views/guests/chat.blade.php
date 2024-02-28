<!-- right chat -->
<div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">USERS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
        
            </div>
        </div>

        <!-- right chat -->
        
<!-- Modal -->
<div class="modal" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="z-index: 1050;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationsModalLabel">{{ $tempNotificationsCount }} New Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="notificationsModalBody">
                <!-- Notifications will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Settings content -->
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                            <label class="item-radio item-content">
                                <input type="radio" id="red" name="color-radio" value="red" checked=""  id="red" >
                                <span class="circle-color bg-red" style="margin-right: 5px"></span>
                            </label>

                            <label class="item-radio item-content">
                                <input type="radio" id="green" name="color-radio" value="green">
                                <span class="circle-color bg-green" style="margin-right: 5px"></span>
                            </label>
      
                            <label class="item-radio item-content">
                                <input type="radio" id="blue" name="color-radio" value="blue" checked="">
                                <span class="circle-color bg-blue" style="margin-right: 5px"></span>
                            </label>
     
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink" id="pink">
                                <span class="circle-color bg-pink" style="margin-right: 5px"></span>
                            </label>
    
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow" id="yellow">
                                <span class="circle-color bg-yellow" style="margin-right: 5px"></span>
                            </label>
             
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange" id="orange">
                                <span class="circle-color bg-orange" style="margin-right: 5px"></span>
                            </label>
                
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray" id="gray">
                                <span class="circle-color bg-gray" style="margin-right: 5px"></span>
                            </label>
     
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown" id="brown">
                                <span class="circle-color bg-brown" style="margin-right: 5px"></span>
                            </label>
           
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen" id="darkgreen">
                                <span class="circle-color bg-darkgreen" style="margin-right: 5px"></span>
                            </label>
      
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink" id="deeppink">
                                <span class="circle-color bg-deeppink" style="margin-right: 5px"></span>
                            </label>

                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue" id="cadetblue">
                                <span class="circle-color bg-cadetblue" style="margin-right: 5px"></span>
                            </label>
       
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid" id="darkorchid">
                                <span class="circle-color bg-darkorchid" style="margin-right: 5px"></span>
                            </label>
                    </ul>
        
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="app-footer border-0 shadow-lg bg-primary-gradiant">
    <a href="#" class="nav-content-bttn" id="openNotificationsModal"><i class="feather-bell"></i></a>
    <a href="{{ route('chatify', ['from_id' => ' ']) }}" class="nav-content-bttn"><i class="feather-message-circle"></i></a>   
    <a href="{{ route('newsfeed') }}" class="nav-content-bttn nav-center zoom-in-out-box"><i class="feather-home" style="font-size: xx-large;"></i></a>
    <!-- <a href="shop-2.html" class="nav-content-bttn"><i class="feather-layers"></i></a> -->
    <a href="#" class="nav-content-bttn nav-center" onclick="openSettingsModal()"><i class="feather-settings"></i></a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"class="nav-content-bttn"><i class="feather-log-out"></i></a>                  
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
        </form>
    <a href="{{ route('guests.profile') }}" class="nav-content-bttn">
        <img src="{{ Auth::user()->photo ? asset('images/photos/' . Auth::user()->photo) : asset('images/female-profile.png') }}" alt="user" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
    </a>

</div>

<script>
    // Handle click event on bell icon
    document.getElementById('openNotificationsModal').addEventListener('click', function(event) {
        event.preventDefault();
        // Show the modal
        $('#notificationsModal').modal('show');
        // Fetch and load notifications into the modal body
        fetchNotifications();
    });

    // Function to fetch and load notifications into the modal body
    function fetchNotifications() {
        fetch('{{ route("fetch-notifications") }}')
            .then(response => response.text())
            .then(data => {
                document.getElementById('notificationsModalBody').innerHTML = data;
            })
            .catch(error => {
                console.error('Error fetching notifications:', error);
            });
    }
</script>

<script>
    // Function to open the settings modal
    function openSettingsModal() {
        $('#settingsModal').modal('show');
    }
</script>


<div class="app-header-search">
    <form class="search-form">
        <div class="form-group searchbox mb-0 border-0 p-1">
            <input type="text" class="form-control border-0" placeholder="Search...">
            <i class="input-icon">
                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
            </i>
            <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                <i class="ti-close font-xs"></i>
            </a>
        </div>
    </form>
</div>


<style>
    .modal-backdrop {
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100vw;
        height: 100vh;
        background-color: #000;
    }   

    .zoom-in-out-box {
        animation: zoom-in-zoom-out 1s ease infinite;
    }

@keyframes zoom-in-zoom-out {
  0% {
    transform: scale(1, 1);
  }
  50% {
    transform: scale(1.5, 1.5);
  }
  100% {
    transform: scale(1, 1);
  }
}

input[type="radio"]#red {
  accent-color: #ff3b30;
}

input[type="radio"]#green {
  accent-color: #4cd964;
}

input[type="radio"]#blue {
  accent-color: #132977;
}

input[type="radio"]#pink {
  accent-color: #ff2d55;
}

input[type="radio"]#orange {
  accent-color: #ff9500;
}

input[type="radio"]#yellow {
  accent-color: #ffcc00;
}

input[type="radio"]#gray {
  accent-color: #8e8e93;
}

input[type="radio"]#darkgreen {
  accent-color: #228B22;
}

input[type="radio"]#brown {
  accent-color: #D2691E;
}

input[type="radio"]#deeppink {
  accent-color: #FFC0CB;
}
input[type="radio"]#cadetblue {
  accent-color: #5f9ea0;
}

input[type="radio"]#darkorchid {
  accent-color: #9932cc;
}
</style>

