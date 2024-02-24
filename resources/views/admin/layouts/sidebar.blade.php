<style>
    .fa-circle-chevron-down,
    .fa-gear,
    .fa-house,
    .fa-people-roof,
    .fa-sliders,
    .fa-list,
    .fa-product-hunt,
    .fa-list-check,
    .fa-money-check-dollar,
    .fa-windows,
    .fa-bolt,
    .fa-tags,
    .fa-pen,
    .fa-user-tie,
    .fa-shield-halved,
    .fa-sack-dollar,
    .fa-window-maximize,
    .fa-comment,
    .fa-tachometer-alt,
    .fa-paperclip {
        color: #5C8374;
        font-size: 15px;
    }

    ul li a {
        font-size: 14px;
    }
</style>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a style="font-size: 22px; color:#5C8374" href="javascript:;"></a>
        </div>


        <ul class="sidebar-menu">

            <li class="menu-header">Ecommerce</li>
            <li><a class="nav-link" href="{{ route('home.page') }}"><i class="fa-solid fa-house"></i>
                    <span>Go To Home Page</span>
                </a></li>

            <li class="dropdown {{ setActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.company.index']) }}">
                <a href="{{ route('admin.company.index') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Companis</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.slider.index']) }}">
                <a href="{{ route('admin.slider.index') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Banner</span></a>
            </li>
  
            <li class="dropdown {{ setActive(['admin.category.index']) }}">
                <a href="{{ route('admin.category.index') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Category</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.company.job-request']) }}">
                <a href="{{ route('admin.company.job-request') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Job Post Request</span></a>
            </li>
            <li class="dropdown {{ setActive(['admin.job-apply']) }}">
                <a href="{{ route('admin.job-apply') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Job Apply By Candidate</span></a>
            </li>
            
            <li class="dropdown {{ setActive(['admin.blog.index']) }}">
                <a href="{{ route('admin.blog.index') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>Blog</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.about-us.index']) }}">
                <a href="{{ route('admin.about-us.index') }}" class="nav-link"><i class="fa-solid fa-bolt"></i><span>About Us</span></a>
            </li>

       



            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-bolt"></i>
                    <span>Manage Category</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link"
                            href="">Categories</a></li>

                </ul>
            </li> --}}

        </ul>

    </aside>
</div>
