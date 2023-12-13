@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home Page Settings</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Settings</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="list-group" id="list-tab" role="tablist">
                                 
                                        <a class="list-group-item list-group-item-action active" id="list-profile-list"
                                            data-toggle="list" href="#list-profile" role="tab">Popular Category Section</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                                            data-toggle="list" href="#list-messages" role="tab">Product Slider One</a>
                                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                                            data-toggle="list" href="#list-settings" role="tab">Product Slider Two</a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content" id="nav-tabContent">
                                    
                                        @include('admin.home-page-setting.section.popularCategory')

                                        @include('admin.home-page-setting.section.product-slider-one')

                                        @include('admin.home-page-setting.section.product-slider-two')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
