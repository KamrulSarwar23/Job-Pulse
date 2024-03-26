@extends('frontend.layouts.master')

@section('title')
    || Login
@endsection
<style>
    .toggle-password {
        display: inline-block;
        margin-left: -40px;
        cursor: pointer;
    }
</style>

@section('content')
    <!--============================LOGIN/REGISTER PAGE START==============================-->
    <section id="wsus__login_register">
        <div class="container">

            @if (session('status'))
                <div id="statusAlert" class="alert alert-danger alert-dismissible fade show rounded-0 text-center"
                    role="alert" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="dismissAlert()">
                        <span aria-hidden="true" style="font-size: 20px; font-weight: bold; color: #721c24;">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <h3 class="mb-3 text-center">Be a Company</h3>
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">signup</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login text-center">

                                    <form action="{{ route('company.login') }}" method="POST">
                                        @csrf
                                        <div class="wsus__login_input">
                                            {{-- <i class="fas fa-user-tie"></i> --}}
                                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            {{-- <i class="fas fa-key"></i> --}}
                                            <input id="login_password" type="password" name="password"
                                                placeholder="Password">
                                            <span id="toggle-login-password" toggle="#login_password"
                                                class="toggle-password fas fa-eye field-icon"
                                                onclick="togglePasswordVisibility(this)"></span>
                                        </div>

                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">

                                                <input id="remember_me" name="remember" class="form-check-input"
                                                    type="checkbox" id="flexSwitchCheckDefault">

                                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password ?</a>
                                        </div>

                                        <button class="common_btn" type="submit">login</button>

                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form action="{{ route('company.register') }}" method="POST">
                                        @csrf
                                        <div class="wsus__login_input">
                                            {{-- <i class="fas fa-user-tie"></i> --}}
                                            <input id="name" value="{{ old('name') }}" type="text"
                                                name="name"placeholder="Company Name">
                                        </div>
                                        <div class="wsus__login_input">
                                            {{-- <i class="far fa-envelope"></i> --}}
                                            <input id="email" name="email" value="{{ old('email') }}" type="text"
                                                placeholder="Email">
                                        </div>

                                        <div class="wsus__login_input">
                                            {{-- <i class="fas fa-key"></i> --}}
                                            <input id="signup_password" type="password" name="password"
                                                placeholder="Password">
                                            <span id="toggle-signup-password" toggle="#signup_password"
                                                class="toggle-password fas fa-eye field-icon"
                                                onclick="togglePasswordVisibility(this)"></span>
                                        </div>

                                        <div class="wsus__login_input">
                                            {{-- <i class="fas fa-key"></i> --}}
                                            <input id="password_confirmation" type="password"
                                                name="password_confirmation" placeholder="Confirm Password">
                                        </div>

                                        <button class="common_btn mt-4" type="submit">signup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================LOGIN/REGISTER PAGE END==============================-->
@endsection

<script>
    function dismissAlert() {
        var alert = document.getElementById('statusAlert');
        alert.remove();
    }

    function togglePasswordVisibility(icon) {
        var input = document.querySelector(icon.getAttribute('toggle'));
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
