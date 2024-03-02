
@extends('frontend.layouts.master')


@section('content')
            <!-- Header End -->
            <div class="container-xxl py-5 bg-dark page-header mb-5">
                <div class="container my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Job Details</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Header End -->
    
    
            <!-- Job Detail Start -->
            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row gy-5 gx-4">
                        <div class="col-lg-8">
                            <div class="d-flex align-items-center mb-5">
                                <div class="text-start">
                                    <h3 class="text-primary mb-3">{{ $jobs->name }}</h3>
                                    <span class="text-truncate"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->address }}</span>
                                    <span class="text-truncate"><i class="far fa-clock text-primary me-2"></i>{{ $jobs->office_time }}</span>
                                    <span class="text-truncate"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->salary }}</span>
                                </div>
                            </div>
    
                            <div class="mb-5">
                                <h4 class="mb-3">Job description</h4>
                                <p>{{ $jobs->description }}</p>

                                <h4 class="my-3">Responsibility</h4>
                                <p>{{ $jobs->responsibility }}</p>
                                <h4 class="my-3">Qualifications</h4>
                                <p>{{ $jobs->qualifications }}</p>

                                <h4 class="my-3">Benefits</h4>
                                <p>{{ $jobs->benefits }}</p>

                                <h4 class="my-3">Business</h4>
                                <p>{{ $jobs->business }}</p>

                            </div>
            
                            <div class="">
                                      <div class="col-sm-12 col-md-4 d-flex flex-column">
                                        <div class="d-flex mb-3">
                                           <form action="{{ route('candidate.job.apply') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{ $jobs->id }}">

                                            <input type="hidden" name="company_id" value="{{ $jobs->user->id }}">
                                           @auth
                                           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                           @endauth

                                           <button class="applied btn btn-primary">Apply Now</button>
                
                                           </form>
                                           
                                        </div>
                                       
                                    </div>
                            </div>
                        </div>
            
                        <div class="col-lg-4">
                            <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                                <h4 class="mb-4">Job Summery</h4>
                                
                                <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $jobs->created_at->format('d F Y')}}</p>
                                <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $jobs->vacancy }} Position</p>
                                <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $jobs->office_from }}</p>
                                <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $jobs->office_time }}</p>
                                <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $jobs->salary }}</p>
                                <p><i class="fa fa-angle-right text-primary me-2"></i>Job Location: {{ $jobs->address }}</p>
                                <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: {{ \Carbon\Carbon::parse($jobs->end_date)->format('d F Y') }}</p>
                            </div>
                            <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                                <h4 class="mb-4">Company Details</h4>
                                <p class="text-primary m-0">Company: {{ $jobs->user->name }}</p>
                                <p><i class="text-primary"></i>Location: {{ $jobs->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Job Detail End -->
@endsection



