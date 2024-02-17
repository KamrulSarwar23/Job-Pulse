@extends('frontend.dashboard.layouts.master')

@section('title')
   || Candidate Dashboard
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <h3 class="mb-3">Candidate Dashboard</h3>
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">

                                <div class="col-xl-6 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Jobs Applied</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-6 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fab fa-product-hunt"></i>
                                        <p>Jobs Saved</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                  

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
