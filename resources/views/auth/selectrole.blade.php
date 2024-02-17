@extends('frontend.layouts.master')

@section('title')
 || Login
@endsection

@section('content')


    <!--============================LOGIN/REGISTER PAGE START==============================-->
    <section id="wsus__login_register">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <h3 class="text-center mb-3">Select Your Role</h3>
                        <div class="col-xl-12 m-auto mb-5">
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