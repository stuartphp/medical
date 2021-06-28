<div>
    <nav class="nav nav-borders">
        <a class="nav-link {{ $nav == 'dashboard' ? 'active' : '' }} ms-0" href="{{ route('user.dashboard') }}">Dashboard</a>
        <a class="nav-link {{ $nav == 'profile' ? 'active' : '' }} ms-0" href="{{ route('user.profile') }}">Profile</a>
        <a class="nav-link {{ $nav == 'address' ? 'active' : '' }} ms-0" href="{{ route('user.address') }}">Address</a>
        <a class="nav-link {{ $nav == 'orders' ? 'active' : '' }}" href="{{ route('user.orders') }}">Orders</a>
        <a class="nav-link {{ $nav == 'team' ? 'active' : '' }}" href="account-security.html">Team</a>
        <a class="nav-link {{ $nav == 'notifications' ? 'active' : '' }}" href="account-notifications.html">Notifications</a>
    </nav>
</div>
