<header>
    <nav>
        <ul class="flex p-4">
            <li class="mr-4"><a href="/">Articles</a></li>
            <li class="mr-4"><a href="/about">About</a></li>
            @if(Auth::guest())
                <li class="mr-4 ml-auto"><a href="/categories">Categories</a></li>
                <li class="mr-4"><a href="/tags">Tags</a></li>
                <li class="mr-4"><a href="/posts">Posts</a></li>
                <li><a href="/logout">Logout</a></li>
            @else
                <li class="ml-auto"><a href="/login">Login</a></li>
            @endif
        </ul>
    </nav>
</header>
