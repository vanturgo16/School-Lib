<style>
    /* span {
        color: white;
        font-weight: 700;
    }

    .subnav-text {
        color: white;
        font-weight: 700;
    } */

</style>
<nav class="main-menu">
    @if(auth()->user()->is_admin == '1')
        <ul>
            <li>
                <a href="{{url('/home')}}">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                    Home
                    </span>
                </a>
            </li>
            <li>
                <a href="{{url('/masters/books/search')}}">
                    <i class="fa fa-file-text-o nav_icon"></i>
                    <span class="nav-text">
                    Book Search
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="javascript:;">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                <span class="nav-text">
                    Master Data
                </span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
                </a>
                <ul>
                    <li>
                        <a class="subnav-text" href="{{url('/masters/authors')}}">
                        Authors
                        </a>
                    </li>
                    <li>
                        <a class="subnav-text" href="{{url('/masters/books')}}">
                        Book
                        </a>
                    </li>
                    <li>
                        <a class="subnav-text" href="{{url('/masters/categories')}}">
                        Category
                        </a>
                    </li>
                    <li>
                        <a class="subnav-text" href="{{url('/masters/users')}}">
                        Users
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    @endif

    @if(auth()->user()->is_admin == '0')
        <ul>
            <li>
                <a href="{{url('/home')}}">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                    Home
                    </span>
                </a>
            </li>
            <li>
                <a href="{{url('/masters/books/search')}}">
                    <i class="fa fa-file-text-o nav_icon"></i>
                    <span class="nav-text">
                    Book Search
                    </span>
                </a>
            </li>
        </ul>
    @endif

    <!--dimatikan kalau pakai SSO-->
    <ul class="logout">
        <li>
        <a href="{{ url('/logout') }}">
        <i class="icon-off nav-icon"></i>
        <span class="nav-text">
        Logout
        </span>
        </a>
        </li>
    </ul>
    
</nav>