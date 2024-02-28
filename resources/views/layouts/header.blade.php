
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo url('theme')?>/dist/assets/images/favicon.ico">

<!-- Bootstrap Css -->
<link href="<?php echo url('theme')?>/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo url('theme')?>/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo url('theme')?>/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<!-- App js -->
<script src="<?php echo url('theme')?>/dist/assets/js/plugin.js"></script>

<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/home" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?php echo url('theme')?>/dist/assets/images/logo.svg" alt="" height="53">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo url('theme')?>/dist/assets/images/pixzel-light.png" alt="" height="50">
                            </span>
                        </a>

                        <a href="/home" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?php echo url('theme')?>/dist/assets/images/logo-light.svg" alt="" height="53">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo url('theme')?>/dist/assets/images/pixzel-light.png" alt="" height="50">
                            </span>
                        </a>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                  <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-bell bx-tada"></i>

                        @if ($notifications !== null)
                            <!-- Filter notifications where is_read is 0 -->
                            @php
                                $unreadNotifications = $notifications->where('is_read', 0);
                                $unreadCount = $unreadNotifications->count();
                            @endphp

                            <!-- Display the count of unread notifications -->
                            <span class="badge bg-danger rounded-pill">{{ $unreadCount }}</span>

                        @else
                            <!-- Handle case when notifications is null -->
                            <span class="badge bg-danger rounded-pill">0</span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('notifications.index') }}" class="small" key="t-view-all"> View All</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            @foreach($notifications as $notification)
                                <a href="{{ route('notification.redirect', $notification) }}" class="text-reset notification-item">
                                    <div class="d-flex">
                                        @if($notification->like_id)
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-info rounded-circle font-size-16" style="width: 35px; margin-right: 5px;">
                                                    <i class="bx bx-like"></i>
                                                </span>
                                            </div>
                                        @elseif($notification->comment_id)
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-secondary rounded-circle font-size-16" style="width: 35px; margin-right: 5px;">
                                                    <i class="bx bx-comment"></i>
                                                </span>
                                            </div>
                                        @elseif($notification->mail_id)
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-danger rounded-circle font-size-16" style="width: 35px; margin-right: 5px;">
                                                    <i class="bx bx-envelope"></i>
                                                </span>
                                            </div>
                                        @elseif($notification->temp_id)
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-warning rounded-circle font-size-16" style="width: 35px; margin-right: 5px;">
                                                    <i class="bx bx-file"></i>
                                                </span>
                                            </div>
                                        @elseif($notification->user_id)
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16" style="width: 35px; margin-right: 5px;">
                                                    <i class="bx bx-user"></i>
                                                </span>
                                            </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $notification->message }}.</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-grammer">{{ $notification->created_at->diffForHumans() }}</p>
                                                @if($notification->user)
                                                    <p class="mb-0">{{ $notification->user->name }}.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>


                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('notifications.index') }}">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-chats-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-message-rounded-dots bx-tada"></i>

                        @if ($chats !== null && $chats->where('to_id', auth()->id())->where('seen', 0)->count() > 0)
                            <!-- Filter chats where to_id is the authenticated user id and seen is 0 -->
                            <span class="badge bg-danger rounded-pill">{{ $chats->where('to_id', auth()->id())->where('seen', 0)->count() }}</span>
                        @else
                            <!-- No unread chats -->
                            <span class="badge bg-danger rounded-pill">0</span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0" key="t-notifications"> Messages </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('chatify', ['from_id' => ' ']) }}" class="small" key="t-view-all"> View All</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            @foreach($chats as $chat)
                                @if($chat->from_id !== auth()->id() && $chat->to_id == auth()->id())
                                    <a href="{{ route('chatify', ['from_id' => $chat->from_id]) }}" class="text-reset notification-item">
                                        <div class="d-flex mb-3">
                                            <div class="avatar-xs me-3">
                                                <span class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @php
                                                        $user = \App\Models\User::find($chat->from_id);
                                                        $userPhoto = $user ? asset('images/photos/' . $user->photo) : asset('default-avatar.jpg');
                                                    @endphp
                                                    <img src="{{ $userPhoto }}" alt="User Photo" class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                </span>
                                            </div>
                                            <div>
                                                <p class="mb-1">
                                                    @php
                                                        $userName = $user ? $user->name : 'Unknown User';
                                                    @endphp
                                                    <h6 style="margin-left: 20px">{{ $userName }}</h6>
                                                    <p class="mb-1" style="margin-left: 20px">{{ $chat->body }}</p>
                                                    <p class="mb-0" key="t-grammer" style="margin-left: 20px; font-size:x-small;">{{ $chat->created_at->diffForHumans() }}</p>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>



                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('chatify', ['from_id' => ' ']) }}">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                            </a>
                        </div>
                    </div>
                </div>



                    <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(auth()->user()->photo)
                            <img class="rounded-circle header-profile-user" src="{{ asset('images/photos/' . auth()->user()->photo) }}"
                                alt="Header Avatar" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover;"  >
                        @else
                            <img class="rounded-circle header-profile-user" src="{{ asset('/images/avatars/avatar-1.png') }}" alt="Header Avatar">
                        @endif
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                            <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                            <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                            <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                            
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="bx bx-cog bx-spin"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

    <!-- JAVASCRIPT -->
    <script src="<?php echo url('theme')?>/dist/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/node-waves/waves.min.js"></script>

    <!-- dashboard blog init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/dashboard-blog.init.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- dashboard blog init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/dashboard-blog.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- file-manager js -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/file-manager.init.js"></script>

    <!-- email editor init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/email-editor.init.js"></script>

    <!-- App js -->
    <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>