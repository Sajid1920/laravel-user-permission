@php
    function activeClass(...$routes) {
        $position = array_map(function ($route) {
            return strpos(Request::route()->getName(), substr($route, 6)) == 6 ? true : false;
        }, $routes);
        return in_array(true, $position) ? 'active' : '';
    }
@endphp

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
	<div class="form-inline mr-auto">
		<ul class="navbar-nav mr-3">
			<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
			<li>
				<a href="#" class="nav-link nav-link-lg fullscreen-btn">
					<i data-feather="maximize"></i>
				</a>
			</li>
			<li>
				<form class="form-inline mr-auto">
					<div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
						<button class="btn" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
			</li>
		</ul>
	</div>
	<ul class="navbar-nav navbar-right">
		<li class="dropdown dropdown-list-toggle">
			<a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
				<span class="badge headerBadge1"> 6 </span>
			</a>
			<div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
				<div class="dropdown-header"> Messages <div class="float-right">
						<a href="#">Mark All As Read</a>
					</div>
				</div>
				<div class="dropdown-list-content dropdown-list-message">
					<a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
							<img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
						</span>
						<span class="dropdown-item-desc">
							<span class="message-user">John Deo</span>
							<span class="time messege-text">Please check your mail !!</span>
							<span class="time">2 Min Ago</span>
						</span>
					</a>
				</div>
				<div class="dropdown-footer text-center">
					<a href="#">View All <i class="fas fa-chevron-right"></i></a>
				</div>
			</div>
		</li>
		<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
			</a>
			<div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
				<div class="dropdown-header">
					Notifications
					<div class="float-right">
						<a href="#">Mark All As Read</a>
					</div>
				</div>
				<div class="dropdown-list-content dropdown-list-icons">
					<a href="#" class="dropdown-item dropdown-item-unread">
						<span class="dropdown-item-icon bg-primary text-white">
							<i class="fas fa-code"></i>
						</span>
						<span class="dropdown-item-desc">
							Template update is available now! <span class="time">2 Min Ago</span>
						</span>
					</a>
				</div>
				<div class="dropdown-footer text-center">
					<a href="#">View All <i class="fas fa-chevron-right"></i></a>
				</div>
			</div>
		</li>
		<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
			<div class="dropdown-menu dropdown-menu-right pullDown">
				<div class="dropdown-title">Hello, {{ auth()->check() ? auth()->user()->name : '' }}</div>
				<a href="profile.html" class="dropdown-item has-icon">
					<i class="far fa-user"></i> Profile
				</a>
				<a href="timeline.html" class="dropdown-item has-icon">
					<i class="fas fa-bolt"></i> Activities
				</a>
				<a href="#" class="dropdown-item has-icon">
					<i class="fas fa-cog"></i> Settings
				</a>
				<div class="dropdown-divider"></div>
				<form action="{{ route( 'logout' ) }}" method="post">
					@csrf
					<a href="#" class="dropdown-item has-icon text-danger">
						<i class="fas fa-sign-out-alt"></i>
						<input type="submit" value="Logout" class="dropdown-item d-inline p-0 text-danger" />
					</a>
				</form>
			</div>
		</li>
	</ul>
</nav>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ url('/') }}">
				{{-- <img alt="image" src="" class="header-logo" /> --}}
				<span class="logo-name">{{ config('app.name') }}</span>
			</a>
		</div>
		<ul class="sidebar-menu">
			<li class="{{ activeClass('admin.dashboard') }}">
				<a href="{{ route('admin.dashboard') }}" class="nav-link">
					<i data-feather="monitor"></i><span>Dashboard</span>
				</a>
			</li>
			@can('view_user')
			<li class="{{ activeClass('admin.users') }}">
				<a href="{{ route('admin.users.index') }}" class="nav-link">
					<i data-feather="user"></i><span>Users</span>
				</a>
			</li>
			@endcan
			@can('view_role')
			<li class="{{ activeClass('admin.roles') }}">
				<a href="{{ route('admin.roles.index') }}" class="nav-link">
					<i data-feather="settings"></i><span>Roles</span>
				</a>
			</li>
			@endcan
		</ul>
	</aside>
</div>
