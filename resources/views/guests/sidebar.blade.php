 <!-- navigation left -->
 <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <!-- <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div> -->
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="{{ route('guests.index')}}" class="nav-content-bttn open-font" ><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>News Feed</span></a></li>
                            <li><a href="{{ route('guests.profile')}}" class="nav-content-bttn open-font"><i class="feather-user btn-round-md bg-primary-gradiant me-3"></i><span>Account Profile </span></a></li> 
                            <li><a href="{{ route('chatify', ['from_id' => ' ']) }}"  class="nav-content-bttn open-font" ><i class="feather-message-circle btn-round-md bg-red-gradiant me-3"></i><span>Messenger</span></a></li>                    
                        </ul>
                    </div>

                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="default-group.html" class="nav-content-bttn open-font" ><i class="feather-settings btn-round-md bg-mini-gradiant me-3"></i><span>Settings</span></a></li>   
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"class="nav-content-bttn open-font" ><i class="feather-log-out btn-round-md bg-gold-gradiant me-3"></i><span>Logout</span></a></li>                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation left -->