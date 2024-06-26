<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Admin Dashboard</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/frontend/vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/frontend/vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/frontend/vendors/images/favicon-16x16.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/frontend/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/frontend/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/vendors/styles/style.css') }}" />
</head>

<body>
    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search Here" />
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                @foreach ($appointments as $appointment)
                                    <li>
                                        <a
                                            href="{{ route('admin.check-appointment', ['appointment' => $appointment]) }}">
                                            <img src="{{ asset('/frontend/vendors/images/img.jpg') }}" alt="" />
                                            <p>
                                                {{ $appointment->name }}
                                            </p>
                                            <p>
                                                {{ $appointment->email }}
                                            </p>
                                            <p>
                                                {{ $appointment->created_at }}
                                            </p>
                                            <small>{{ $currentTime->diffForHumans($appointment->created_at) }}</small>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="{{ asset('/frontend/vendors/images/admin.jpg') }}" alt="" />
                        </span>
                        <span class="user-name">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault(); document-getElementById('form-logout').submit()"><i
                                class="dw dw-logout"></i> Log Out</a>
                        <form action="{{ route('admin.logout') }}" method="post" id="form-logout">@csrf</form>
                    </div>
                </div>
            </div>
            <div class="github-link">
                <a href="https://github.com/dropways/deskapp" target="_blank"><img
                        src="{{ asset('/frontend/vendors/images/github.svg') }}" alt="" /></a>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i
                                class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i
                                class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i
                                class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i
                                class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset('/frontend/vendors/images/deskapp-logo.svg') }}" alt=""
                    class="dark-logo" />
                <img src="{{ asset('/frontend/vendors/images/deskapp-logo-white.svg') }}" alt=""
                    class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ route('admin.appointment-confirm') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Email</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-archive"></span><span class="mtext">Administration</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.user-table') }}">Manage User</a></li>
                            <li><a href="{{ route('admin.calendar-table') }}">Manage Appointment</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Hospital Overview</h2>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ DB::table('appointments')->count() }}
                                </div>
                                <div class="font-14 text-secondary weight-500">
                                    Appointment
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy dw dw-calendar1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ DB::table('users')->count() }}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Patient
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <span class="icon-copy ti-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-10">
                <div class="col-md-8 mb-20">
                    <div class="card-box height-100-p pd-20">
                        <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
                            <div class="h5 mb-md-0">Hospital Activities</div>
                            <div class="form-group mb-md-0">
                                <select class="form-control form-control-sm selectpicker">
                                    <option value="">Last Week</option>
                                    <option value="">Last Month</option>
                                    <option value="">Last 6 Month</option>
                                    <option value="">Last 1 year</option>
                                </select>
                            </div>
                        </div>
                        <div id="activities-chart"></div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64">
                        <div class="d-flex justify-content-between pb-20 text-white">
                            <div class="icon h1 text-white">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                            </div>
                            <div class="font-14 text-right">
                                <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                                <div class="font-12">Since last month</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="text-white">
                                <div class="font-14">Appointment</div>
                                <div class="font-24 weight-500">{{ DB::table('appointments')->count() }}</div>
                            </div>
                            <div class="max-width-150">
                                <div id="appointment-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                        <div class="d-flex justify-content-between pb-20 text-white">
                            <div class="icon h1 text-white">
                                <i class="fa fa-stethoscope" aria-hidden="true"></i>
                            </div>
                            <div class="font-14 text-right">
                                <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                                <div class="font-12">Since last month</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="text-white">
                                <div class="font-14">Surgery</div>
                                <div class="font-24 weight-500">250</div>
                            </div>
                            <div class="max-width-150">
                                <div id="surgery-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="d-flex justify-content-between pb-10">
                            <div class="h5 mb-0">Top Doctors</div>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="user-list">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('/frontend/vendors/images/photo1.jpg') }}"
                                                class="border-radius-100 box-shadow" width="50" height="50"
                                                alt="" />
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5"
                                                data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Neil Wagner</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">
                                                Pediatrician
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('/frontend/vendors/images/photo2.jpg') }}"
                                                class="border-radius-100 box-shadow" width="50" height="50"
                                                alt="" />
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5"
                                                data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Ren Delan</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">
                                                Pediatrician
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('/frontend/vendors/images/photo3.jpg') }}"
                                                class="border-radius-100 box-shadow" width="50" height="50"
                                                alt="" />
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5"
                                                data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Garrett Kincy</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">
                                                Pediatrician
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('/frontend/vendors/images/photo4.jpg') }}"
                                                class="border-radius-100 box-shadow" width="50" height="50"
                                                alt="" />
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5"
                                                data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Callie Reed</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">
                                                Pediatrician
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="d-flex justify-content-between">
                            <div class="h5 mb-0">Diseases Report</div>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </div>

                        <div id="diseases-chart"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="max-width-300 mx-auto">
                            <img src="{{ asset('/frontend/vendors/images/upgrade.svg') }}" alt="" />
                        </div>
                        <div class="text-center">
                            <div class="h5 mb-1">Upgrade to Pro</div>
                            <div class="font-14 weight-500 max-width-200 mx-auto pb-20" data-color="#a6a6a7">
                                You can enjoy all our features by upgrading to pro.
                            </div>
                            <a href="#" class="btn btn-primary btn-lg">Upgrade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('/frontend/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('/frontend/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/frontend/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/frontend/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/frontend/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/frontend/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/dashboard3.js') }}"></script>
</body>

</html>
