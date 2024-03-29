@extends('company.layouts.master')

@section('title')
   || Blog Post
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Employee</h3>
                        <div class="create-button">
                            {{-- <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Create Employee</a> --}}
                        </div>
                        <div class="wsus__dashboard_profile mt-5">
                            <div class="wsus__dash_pro_area">
                               <h3>Employee Module Coming Soon</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


