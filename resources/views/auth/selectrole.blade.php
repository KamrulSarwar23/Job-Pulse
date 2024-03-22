@extends('frontend.layouts.master')

@section('title')
 || Login
@endsection

@section('content')


    <!--============================LOGIN/REGISTER PAGE START==============================-->

    <section id="wsus__login_register">
        @if (session('status'))
        <div id="statusAlert" class="alert alert-danger alert-dismissible fade show rounded-0 text-center" role="alert"
            style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="dismissAlert()">
                <span aria-hidden="true" style="font-size: 20px; font-weight: bold; color: #721c24;">&times;</span>
            </button>
        </div>
        @endif

        <div class="container py-5">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="wsus__login_reg_area">
                        <h3 class="text-center mb-3">Select Your Role</h3>
                        <p>If You Wanna Find a Job Then Login As Candidate. If You Wanna Hired Employee Then Login As Company</p>
                        <div class="col-xl-12 m-auto mb-5 text-center">
                           <a class="btn btn-primary m-3" href="{{ route('candidate.login') }}">Login As Candidate</a>
                           <a class="btn btn-primary" href="{{ route('company.login') }}">Login As Company</a>
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
</script>