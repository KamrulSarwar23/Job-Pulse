@extends('frontend.dashboard.layouts.master')

@section('title')
    {{ $setting->site_name }} || Vendor Request
@endsection


@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Vendor Request</h3>
                        <div class="wsus__dashboard_profile mb-3">
                            <div class="wsus__dash_pro_area">
                                <p>{!! @$vendorcondition->content !!}</p>
                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('user.vendor-request-send') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input type="file" placeholder="Shop Image" name="shop_image" value="">
                                    </div>

                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input type="text" placeholder="Shop Name" name="shop_name" value="">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" placeholder="Shop Email" name="shop_email"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" placeholder="Shop Phone" name="shop_phone"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input type="text" placeholder="Shop Address" name="shop_address" value="">
                                    </div>

                                    <div class="wsus__dash_pro_single">

                                        <textarea id="" name="about" placeholder="About Yourself"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit request</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
