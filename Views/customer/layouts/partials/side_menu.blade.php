<ul id="menu">
    <li class="drop"><a href="{{ route('customer.index') }}">Home</a>
        {{--<ul>--}}
            {{--<li><a href="{{ route('customer.profile.index') }}">My Profile</a></li>--}}
        {{--</ul>--}}
    </li>
    <li class="drop"><a href="{{ route('customer.tasks.index') }}">Tasks</a>
        <ul>
            <li><div class="whiter"></div>
                <a href="{{ route('customer.tasks.completed') }}" title="View Completed Tasks">
                    Completed Tasks
                </a>
            </li>
            <li><div class="whiter"></div>
                <a href="{{ route('customer.tasks.index') }}" title="View Tasks">Tasks</a>
            </li>
        </ul>
    </li>
    <li class="drop"><a href="{{ route('customer.manual.index') }}">Manual</a>
        <ul>
            <li class="drop"><a href="{{ route('customer.manual.search') }}">Search</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ route('customer.logout') }}">Logout</a>
    </li>
</ul>