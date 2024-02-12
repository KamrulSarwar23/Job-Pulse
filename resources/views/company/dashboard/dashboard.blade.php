@extends('company.layouts.master')

@section('title')
    || Vendor Dashboard
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <h3 class="mb-3">Vendor Dashboard</h3>
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Todays Order</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fab fa-product-hunt"></i>
                                        <p>Todays Pending Order</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fas fa-star"></i>
                                        <p>Total Order</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fas fa-user-shield"></i>
                                        <p>Total Pending Order</p>

                                        <h5 class="text-light"></h5>

                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="far fa-heart"></i>
                                        <p>Total Complete Order</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>Total Product</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item purple" href="javascript:;">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>Todays Earning</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item green" href="javascript:;">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>This Month Earning</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item orange" href="javascript:;">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>This Year Earning</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item purple" href="javascript:;">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>Total Earning</p>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>Total Review</p>
                                        <h5 class="text-light"></h5>
                                        <h5 class="text-light"></h5>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item orange" href="">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>Profile</p>
                                        <h5 class="text-light">-</h5>
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
