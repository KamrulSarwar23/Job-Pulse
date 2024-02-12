  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home.page') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobPulse</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home.page') }}" class="{{ setActive(['home.page']) }} nav-item nav-link">Home</a>
            <a href="{{ route('about.page') }}" class="{{ setActive(['about.page']) }} nav-item nav-link">About</a>
            <a href="{{ route('job.page') }}" class="{{ setActive(['job.page']) }} nav-item nav-link">Jobs</a>
            <a href="{{ route('blog.page') }}" class="{{ setActive(['blog.page']) }} nav-item nav-link">Blog</a>
            <a href="{{ route('contact.page') }}" class="{{ setActive(['contact.page']) }} nav-item nav-link">Contact</a>

        </div>
        <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login Here<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->