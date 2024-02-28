
<style>
    .notification-card:hover {
        background-color: #000000; 
        transition: background-color 0.3s ease;
    }

</style>

 <!-- navigation top-->
 <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="index.html"><i class="feather-file-text text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">Blog.TS</span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>
            </div>
            
            <form action="{{ route('search') }}" method="GET" class="float-left header-search">
                <div class="form-group mb-0 icon-input">
                    <i class="feather-search font-sm text-grey-400"></i>
                    <input type="text" name="query" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
                </div>
            </form>

            <!-- Display search results here -->
            @if(isset($searchResults))
                <!-- Display search results -->
                @forelse($searchResults as $result)
                    @if ($result instanceof \App\Models\User)
                        {{-- User search result --}}
                        <div class="result-item">
                            <!-- Display user information -->
                            <p>{{ $result->name }}</p>
                        </div>
                    @else
                        {{-- Template search result --}}
                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <!-- Card content for each template search result -->
                            <div class="card-body p-0 d-flex">
                                <figure class="avatar me-3">
                                    <img src="{{ asset('images/photos/' . $result->user->photo) }}" alt="User Photo" class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                </figure>
                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $result->user->name }}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $result->created_at->diffForHumans() }}</span></h4>
                            </div>

                            <div class="card-body p-0 me-lg-6">
                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">
                                    <p class="fw-700 text-black lh-26 font-xss w-100">{{ $result->header }} </p>
                                    {!! Illuminate\Support\Str::limit($result->description, 150) !!}
                                    <a href="{{ route('guests.show', $result) }}" class="fw-600 text-primary ms-2"> Read more</a>
                                </p>
                            </div>

                            <!-- Display views, likes, comments, and comments form -->

                        </div>
                    @endif
                @empty
                    <p>No search results found.</p>
                @endforelse
            @endif


            <a href="{{ route('newsfeed')}}" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current "></i></a>
            
            <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false">
                @if($tempNotificationsCount > 0)
                    <span class="dot-count bg-warning"></span>
                @endif
                <i class="feather-bell font-xl text-current"></i>
            </a>


            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">
                
            <h4 class="fw-700 font-xss mb-4"> {{ $tempNotificationsCount }} New Notifications</h4>
                <div style="max-height: 500px; overflow-y: auto;">
                    @if($tempNotifications->isNotEmpty())
                        @foreach($tempNotifications as $notification)
                            @php
                                $template = App\Models\Template::find($notification->temp_id);
                                $header = Str::limit($template->header, 50);
                            @endphp
                            <a href="{{ route('guests.show', ['guest' => $template->id]) }}" class="text-decoration-none notification-card" onclick="markAsRead({{ $notification->id }})">
                                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                                    <img src="{{ $template ? asset('images/banners/' . $template->banner) : asset('images/user-default.png') }}" alt="template banner" class="w40 position-absolute left-0">
                                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">{{ $header }} <span class="text-grey-400 font-xsssss fw-600 float-right mt-1">{{ $notification->created_at->diffForHumans() }}</span></h5>
                                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">{{ $notification->message }}</h6>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p>No new notifications.</p>
                    @endif
                </div>
            </div>
            
           
            <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
                <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                <div class="dropdown-menu-settings switchcolor-wrap">
                    <h4 class="fw-700 font-sm mb-4">Settings</h4>
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                                <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                                <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                                <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                                <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                                <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                            </label>
                        </li>

                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                                <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                                <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                                <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                                <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                                <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                            </label>
                        </li>
                    </ul>
                    
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu-color"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    
                </div>
            </div>

            <a href="{{ route('guests.profile')}}" class="p-0 ms-3 menu-icon">
                @php
                    $userPhoto = Auth::user()->photo ? asset('images/photos/' . Auth::user()->photo) : url('sociala/images/profile-4.png');
                @endphp
                <img src="{{ $userPhoto }}"  alt="User Photo" class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
            </a>

        </div>
        <!-- navigation top -->

<script>
    function markAsRead(notificationId) {
        // Make an AJAX request to update the is_read status
        fetch(`/mark-as-read/${notificationId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                console.log('Notification marked as read');
            } else {
                console.error('Failed to mark notification as read');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
