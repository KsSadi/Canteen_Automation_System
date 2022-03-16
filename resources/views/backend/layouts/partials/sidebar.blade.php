<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard') }}"><span style="margin-top: -10px" class="brand-logo">
                        <img src="{{url('/img/logo.png')}}" alt="SUB"/>

                        </span>
                    <h2 class="brand-text">SUB CAS</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <li class=" nav-item  @if (Request::is('dashboard')) nav-item active
								  @endif">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">

                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>

            </li>

{{--Start saleable Products--}}
            <div class="divider divider-info divider-start-center">
                <div class="divider-text">Saleable Products</div>
            </div>

            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='shopping-cart'></i><span class="menu-title text-truncate" data-i18n="Datatable">Sell Products</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='edit'></i><span class="menu-item text-truncate" data-i18n="Basic">New Sale</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='eye'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Manage Sales</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='tag'></i><span class="menu-title text-truncate" data-i18n="Datatable">Item</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Item</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Item</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
                   @endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='activity'></i><span class="menu-title text-truncate" data-i18n="Datatable">Category</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Category</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Category</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
{{--End Saleable Product--}}

            {{--Start Purchase Products--}}
            <div class="divider divider-info divider-start-center">
                <div class="divider-text">Purchase Products</div>
            </div>

            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='shopping-bag'></i><span class="menu-title text-truncate" data-i18n="Datatable">Purchase Products</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='edit'></i><span class="menu-item text-truncate" data-i18n="Basic">New Purchase</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='eye'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Manage Purchase</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='tag'></i><span class="menu-title text-truncate" data-i18n="Datatable">Item</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Item</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Item</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
                   @endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='activity'></i><span class="menu-title text-truncate" data-i18n="Datatable">Category</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Category</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Category</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{--End Puchace Product--}}
            {{--Start Stock Products--}}
            <div class="divider divider-info divider-start">
                <div class="divider-text">  Stock</div>
            </div>

            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
                @endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='bar-chart-2'></i><span class="menu-title text-truncate" data-i18n="Datatable">Current Stock</span></a>
                    <ul class="menu-content">
                         <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='eye'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">View Stock Purchase</span></a>
                            </li>

                    </ul>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='log-out'></i><span class="menu-title text-truncate" data-i18n="Datatable">Stock Out</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Item</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Item</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            {{--End Stock Product--}}

            <div class="divider divider-info divider-start">
                <div class="divider-text"> User</div>
            </div>
            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='user-check'></i><span class="menu-title text-truncate" data-i18n="Datatable">Employee</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Employee</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Employee</span></a>
                            </li>
                        @endif
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Salary</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roles*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='cpu'></i><span class="menu-title text-truncate" data-i18n="Datatable">Roles</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Roles</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Roles</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->can('admin.view'))

                <li class=" nav-item  @if (Request::is('dashboard/admins*'))
                    nav-item active @endif">
                    <a class="d-flex align-items-center" href="javascript:;"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Datatable">Admins</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/admins"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">Admins List</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('admin.create'))

                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.admins.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Admin</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

{{-- Start Report PArt--}}

            <div class="divider divider-info divider-start">
                <div class="divider-text"> Reports</div>
            </div>



            @if (Auth::guard('admin')->user()->can('role.view'))


                <li class=" nav-item  @if (Request::is('dashboard/roless*'))
                    nav-item active
@endif"><a class="d-flex align-items-center" href="javascript:;"><i data-feather='activity'></i><span class="menu-title text-truncate" data-i18n="Datatable">Report</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='eye'></i><span class="menu-item text-truncate" data-i18n="Basic">View Roles</span></a>
                        </li>
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <li><a class="d-flex align-items-center " href="{{ route('dashboard.roles.create') }}"><i data-feather='edit'></i></i><span class="menu-item text-truncate" data-i18n="Advanced">Create Roles</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


{{--End Report Part--}}

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
