<header>
    <nav>
        <ul class="flex p-4">
            <li class="mr-4"><a href="/">Posts</a></li>
            <li class="mr-4"><a href="/about">About</a></li>
            @if(Auth::guest())
                <li class="ml-auto"><a href="/login">Login</a></li>
            @else
                <li class="mr-4 ml-auto"><a href="/categories">Categories</a></li>
                <li class="mr-4"><a href="/tags">Tags</a></li>
                <li class="mr-4"><a href="/articles">Articles</a></li>
                <li>
                    <a href="/logout"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </li>
            @endif
        </ul>
    </nav>
</header>
