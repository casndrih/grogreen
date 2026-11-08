<header class="admin-top"><div><small>GROGREEN / ADMIN</small><h1>@yield('heading','Overview')</h1></div><div>{{ auth('admin')->user()->name ?? 'Administrator' }}</div></header>
