<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
    <li>
        <a href="{{route('home')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
    </li>
    @can('view', User::class)
    <li>
        <a href="{{route('users.index')}}"><i class="fa fa-fw fa fa-user"></i> Users</a>
    </li>
    @endcan
    <li>
        <a href="{{route('companies.index')}}"><i class="fa fa-fw fa-building-o"></i> Companies</a>
    </li>
    <li>
        <a href="{{route('employees.index')}}"><i class="fa fa-fw fa-users"></i> Employess</a>
    </li>
</ul>
</div>

</nav>

