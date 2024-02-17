@extends('frontend.layouts.master')


@section('content')
    <!-- Header End -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Job List</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @if (count($jobs) > 0)
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            @endif
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">


                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @if (count($jobs) > 0)
                            <div class="job-item p-4 mb-4">

                                @foreach ($jobs as $item)
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src=" {{ asset($item->user->image) }}" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $item->name }} <span class="text-truncate me-3 text-primary"><i class="text-primary me-2"></i>{{ $item->user->name }}</span></h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->address }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>{{ $item->office_from }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>{{ $item->office_time }}</span>
                                                <span class="text-truncate me-0"><i
                                                        class="far fa-money-bill-alt text-primary me-2"></i>{{ $item->salary }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">

                                                <a class="btn btn-primary" href="">Apply Now</a>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                        <h2 class="text-primary">No Data Found</h2>
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection
