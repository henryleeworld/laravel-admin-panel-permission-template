<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>
    @can('users_manage')
    <li class="nav-group {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'show' : '' }}">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-people') }}"></use>
            </svg>
            {{ trans('cruds.user_management.title') }}
        </a>
        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-briefcase') }}"></use>
                    </svg>
                    {{ trans('cruds.permission.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-badge') }}"></use>
                    </svg>
                    {{ trans('cruds.role.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>
                    {{ trans('cruds.user.title') }}
                </a>
            </li>
        </ul>
    </li>
    @endcan
</ul>