@php
    $activated_plugins = App\Models\CompanyPlugin::where('company_id', auth()->user()->id)
        ->pluck('plugin_id')
        ->toArray();
    $plugins = App\Models\Plugin::whereIn('id', $activated_plugins)->where('status', 1)->get();

@endphp

<style>
    .active {
        background-color: rgba(0, 0, 0, 0.4);
    }
</style>

<div class="dashboard_sidebar">
    <span class="close_icon">
        <i class="far fa-bars dash_bar"></i>
        <i class="far fa-times dash_close"></i>
    </span>
    <a href="" class="dash_logo"><img src="" alt="" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li class=""><a class="" href="{{ route('home.page') }}"><i class="fas fa-home"></i>Go To Home
                Page</a></li>
        <li class="{{ setActive(['company.dashboard']) }}"><a class="" href="{{ route('company.dashboard') }}"><i
                    class="far fa-clipboard"></i>Dashboard</a></li>

        <li class="{{ setActive(['company.jobs.index', 'company.jobs.edit', 'company.jobs.create']) }}"><a
                class="" href="{{ route('company.jobs.index') }}"><i class="far fa-clipboard"></i>Job Post</a>
        </li>

        <li class="{{ setActive(['company.job-apply-company']) }}"><a class=""
                href="{{ route('company.job-apply-company') }}"><i class="far fa-clipboard"></i>All Application</a>
        </li>


        <li>

            @foreach ($plugins as $plugin)
                @if ($plugin->slug == 'blog')
        <li class="{{ setActive(['company.blog.index', 'company.blog.create', 'company.blog.edit']) }}"><a
                href="{{ route('company.blog.index') }}"><i class="far fa-clipboard"></i>{{ $plugin->name }}</a></li>
    @elseif ($plugin->slug == 'employee')
        <li class="{{ setActive(['company.employee']) }}"><a href="{{ route('company.employee') }}"><i
                    class="far fa-clipboard"></i>{{ $plugin->name }}</a></li>
    @elseif ($plugin->slug == 'page')
        <li class="{{ setActive(['company.page']) }}"><a href="{{ route('company.page') }}"><i
                    class="far fa-clipboard"></i>{{ $plugin->name }}</a></li>
        @endif
        @endforeach

        <li class="{{ setActive(['company.plugin.index']) }}"><a href="{{ route('company.plugin.index') }}"><i
                    class="far fa-clipboard"></i>Plugin</a></li>

        <li class="{{ setActive(['company.profile']) }}"><a href="{{ route('company.profile') }}"><i
                    class="far fa-clipboard"></i> My Profile</a></li>
        <li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                this.closest('form').submit()";><i
                        class="far fa-sign-out-alt"></i>Log out</a>
            </form>

        </li>
    </ul>
</div>
