
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
    
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            <li>
                <a href="{{ route('home') }}" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/') }}" class="waves-effect">
                    <i class="bx bx-world"></i>
                    <span key="t-guests">Explore Blogs</span>
                </a>
            </li>

            <li class="menu-title" key="t-apps">Permissions</li>

            <li>
            @canany(['create-user', 'edit-user', 'delete-user'])
                <a href="{{ route('users.index') }}" class="waves-effect">
                    <i class="bx bx-user"></i>
                    <span key="t-user">Users</span>
                </a>
            @endcanany
            </li>

            <li>
            @canany(['create-role', 'edit-role', 'delete-role'])
                <a href="{{ route('roles.index') }}" class="waves-effect">
                    <i class="bx bx-key"></i>
                    <span key="t-key">Roles</span>
                </a>
            @endcanany
            </li>

            <li>
            @canany(['create-permission', 'edit-permission', 'delete-permission'])
                <a href="{{ route('permissions.index') }}" class="waves-effect">
                    <i class="bx bx-lock"></i>
                    <span key="t-key">Permissions</span>
                </a>
            @endcanany
            </li>

            <li class="menu-title" key="t-apps">Publications</li>

            <li>
            @canany(['create-blog', 'edit-blog', 'delete-blog'])
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-detail"></i>
                    <span key="t-blog">Blogs</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('templates.index') }}" key="t-blog-list">Manage Blogs</a></li>
                    <li><a href="{{ route('templates.list') }}" key="t-blog-grid">Blog List</a></li>
                    <li><a href="{{ route('templates.grid') }}" key="t-blog-grid">Blog Grid</a></li>
                </ul>
            @endcanany
            </li>

            <li>
            @canany(['create-blog', 'edit-blog', 'delete-blog'])
                <a href="{{ route('templates.gallery') }}" class="waves-effect">
                    <i class="bx bx-images"></i>
                    <span key="t-gallery">Gallery</span>
                </a>
            @endcanany
            </li>
            
            <li>
            @canany(['create-ad', 'edit-ad', 'delete-ad'])
                <a href="{{ route('advertisements.index') }}" class="waves-effect">
                    <i class="bx bx-play-circle"></i>
                    <span key="t-ad">Advertisements</span>
                </a>
            @endcanany
            </li>


            <li>
            @canany(['create-category', 'edit-category', 'delete-category'])
                <a href="{{ route('categories.index') }}" class="waves-effect">
                    <i class="bx bx-customize"></i>
                    <span key="t-category">Categories</span>
                </a>
            @endcanany
            </li>

            <li class="menu-title" key="t-apps">Transactions</li>

            <li>
            @canany(['create-mail', 'edit-mail', 'delete-mail'])
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-envelope"></i>
                    <span key="t-email">Emails</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('emails.create') }}" key="t-inbox">Compose</a></li>
                    <li><a href="{{ route('emails.inbox') }}" key="t-inbox">Inbox</a></li>
                    <li><a href="{{ route('emails.sent-mail') }}" key="t-inbox">Sent</a></li>
                    <!-- <li><a href="{{ route('emails.draft') }}" key="t-inbox">Draft</a></li>
                    <li><a href="{{ route('emails.trash') }}" key="t-inbox">Trash</a></li> -->
                    
                </ul>
            @endcanany
            </li>

            <li>
            @canany(['create-notification', 'edit-notification', 'delete-notification'])
                <a href="{{ route('notifications.index') }}" class="waves-effect">
                    <i class="bx bx-bell"></i>
                    <span key="t-comment">Notifications</span>
                </a>
            @endcanany
            </li>

            <li>
            @canany(['create-chat', 'edit-chat', 'delete-chat'])
                <a href="{{ route('chatify', ['from_id' => ' ']) }}" class="waves-effect">
                    <i class="bx bx-chat"></i>
                    <span key="t-comment">Chats</span>
                </a>
            @endcanany
            </li>

            <li class="menu-title" key="t-apps">Others</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-task"></i>
                    <span key="t-tasks">Tasks</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="tasks-list.html" key="t-task-list">Task List</a></li>
                    <li><a href="tasks-kanban.html" key="t-kanban-board">Kanban Board</a></li>
                    <li><a href="tasks-create.html" key="t-create-task">Create Task</a></li>
                </ul>
            </li>

            <li>
                <a href="comments.html" class="waves-effect">
                    <i class="bx bx-timer"></i>
                    <span key="t-timeline">Timeline</span>
                </a>
            </li>

            <li>
                <a href="comments.html" class="waves-effect">
                    <i class="bx bx-question-mark"></i>
                    <span key="t-faq">FAQs</span>
                </a>
            </li>



        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->

<!-- JAVASCRIPT -->
<script src="<?php echo url('theme')?>/dist/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="<?php echo url('theme')?>/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard blog init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/dashboard-blog.init.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard blog init -->
    <script src="assets/js/pages/dashboard-blog.init.js"></script>

    <script src="assets/js/app.js"></script>