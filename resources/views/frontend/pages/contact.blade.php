
@extends('frontend.layouts.master')


@section('content')
            <!-- Header End -->
            <div class="container-xxl py-5 bg-dark page-header mb-5">
                <div class="container my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Contact</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Header End -->
    
    
            <!-- Contact Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row gy-4">
                                <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="d-flex align-items-center bg-light rounded p-4">
                                        <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <span>{{ @$contactInformation->address }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="d-flex align-items-center bg-light rounded p-4">
                                        <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-envelope-open text-primary"></i>
                                        </div>
                                        <span>{{ @$contactInformation->email }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="d-flex align-items-center bg-light rounded p-4">
                                        <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-phone-alt text-primary"></i>
                                        </div>
                                        <span>{{ @$contactInformation->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <iframe class="position-relative rounded w-100 h-100"
                                src="{{ @$contactInformation->map }}"
                                frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>

                        <div class="col-md-6">
                            <div class="wow fadeInUp" data-wow-delay="0.5s">

                                <form action="{{ route('send.message') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                                <label for="name">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                                <label for="subject">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

    <!-- Category Start -->
    <div class="container-xxl pt-5">
        <div class="container">
            <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Companis Belive In Us</h2>
            <div class="row g-4">

                @foreach ($company as $item)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="javascript:;">
                            @if ($item->image)
                            <img width="100px" height="80px" src="{{ asset($item->image) }}" alt="">
                            @else
                            <i class="fas fa-building mb-3"></i>
                            @endif
                           
                            <p class="mb-3">{{ limitText($item->name, 20) }}</p>
                        </a>
                    </div>
                    @endforeach
    
                
            </div>

        </div>
    </div>
    <!-- Category End -->
            
@endsection