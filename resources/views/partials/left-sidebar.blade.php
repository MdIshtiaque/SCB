<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li class="{{ Request::is('/dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->role_id == "1")
                    <li class="{{ Request::is('user-management/add-new-user') || Request::is('user-management/user-list') ? 'mm-active' : '' }}">
                        <a href="javascript: void(0);"
                           class="has-arrow {{ Request::is('user-management/add-new-user') || Request::is('user-management/user-list') ? 'mm-active' : '' }}">
                            <i data-feather="users"></i>
                            <span data-key="t-authentication">User Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li class="{{ Request::is('user-management/add-new-user') ? 'mm-active' : '' }}"><a
                                    href="{{ route('user-management.add-new-user') }}" data-key="t-login"
                                    class="{{ Request::is('user-management/add-new-user') ? 'active' : '' }}">Add New
                                    User</a></li>
                        </ul>
                        <ul class="sub-menu" aria-expanded="false">
                            <li class="{{ Request::is('user-management/user-list') ? 'mm-active' : '' }}"><a
                                    href="{{ route('user-management.user-list') }}" data-key="t-login"
                                    class="{{ Request::is('user-management/user-list') ? 'active' : '' }}">User List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('email-recipients/email-list') ? 'mm-active' : '' }}">
                        <a href="{{ route('email-recipients.email-list') }}">
                            <i data-feather="mail"></i>
                            <span data-key="t-dashboard">Email Recipients</span>
                        </a>
                    </li>
                @endif
                {{--                @if(auth()->user()->role_id == "1")--}}
                {{--                    <li class="{{ Request::is('user-management/add-new-user') || Request::is('user-management/user-list') ? 'mm-active' : '' }}">--}}
                {{--                        <a href="javascript: void(0);"--}}
                {{--                           class="has-arrow {{ Request::is('user-management/add-new-user') || Request::is('user-management/user-list') ? 'mm-active' : '' }}">--}}
                {{--                            <i data-feather="users"></i>--}}
                {{--                            <span data-key="t-authentication">{{ __('User Management') }}</span>--}}
                {{--                        </a>--}}
                {{--                        <ul class="sub-menu" aria-expanded="false">--}}
                {{--                            <li class="{{ Request::is('user-management/add-new-user') ? 'mm-active' : '' }}"><a--}}
                {{--                                    href="{{ route('user-management.add-new-user') }}" data-key="t-login"--}}
                {{--                                    class="{{ Request::is('user-management/add-new-user') ? 'active' : '' }}">{{ __('Add New User') }}</a></li>--}}
                {{--                        </ul>--}}
                {{--                        <ul class="sub-menu" aria-expanded="false">--}}
                {{--                            <li class="{{ Request::is('user-management/user-list') ? 'mm-active' : '' }}"><a--}}
                {{--                                    href="{{ route('user-management.user-list') }}" data-key="t-login"--}}
                {{--                                    class="{{ Request::is('user-management/user-list') ? 'active' : '' }}">{{ __('User List') }}</a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                @endif--}}
                {{--                <li class="{{ Route::currentRouteNamed('filled-data.river-stretches') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretches.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points.activities') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points.activities')--}}
                {{--                              ? 'mm-active' : ''--}}
                {{--                                }}">--}}
                {{--                    <a href="javascript: void(0);" class="has-arrow {{ Route::currentRouteNamed('filled-data.river-stretches') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretches.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points.activities') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points.activities')--}}
                {{--                              ? 'mm-active' : ''--}}
                {{--                                }}">--}}
                {{--                        <i data-feather="file-text"></i>--}}
                {{--                        <span data-key="t-pages">{{ __('Field Data') }}</span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                {{--                        <li class="{{ Route::currentRouteNamed('filled-data.water-source') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points.activities')--}}
                {{--                              ? 'mm-active' : ''--}}
                {{--                                }}"--}}
                {{--                        ><a class="{{ Route::currentRouteNamed('filled-data.water-source') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.water-source.location-points.activities')--}}
                {{--                              ? 'active' : ''--}}
                {{--                                }}"--}}
                {{--                            href="{{ route('filled-data.water-source') }}"--}}
                {{--                            data-key="t-starter-page">{{ __('Water Source') }}</a>--}}
                {{--                        </li>--}}
                {{--                        <li class="{{ Route::currentRouteNamed('filled-data.river-stretches') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretches.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points.activities')--}}
                {{--                              ? 'mm-active' : ''--}}
                {{--                                }}"--}}
                {{--                        ><a class="{{ Route::currentRouteNamed('filled-data.river-stretches') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretches.view-inventory') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points') ||--}}
                {{--                              Route::currentRouteNamed('filled-data.river-stretch.location-points.activities')--}}
                {{--                              ? 'active' : ''--}}
                {{--                                }}" href="{{ route('filled-data.river-stretches') }}" data-key="t-maintenance">{{ __('River Stretch') }}</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li class="{{ Request::is('/notice') ? 'mm-active' : '' }}">--}}
                {{--                    <a href="{{ route('notice') }}">--}}
                {{--                        <i data-feather="bell"></i>--}}
                {{--                        <span data-key="t-dashboard">{{ __('Notice') }}</span>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
