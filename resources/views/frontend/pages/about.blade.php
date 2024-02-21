@extends('frontend.layouts.master')


@section('content')
            <!-- Header End -->
            <div class="container-xxl py-5 bg-dark page-header mb-5">
                <div class="container my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">About</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Header End -->
    
    
            <!-- About Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="row g-0 about-bg rounded overflow-hidden">

                                @foreach ($aboutImage as $index => $item)
                                @if ($index == 1)
                                <div class="col-6 text-start">
                                    <img class="img-fluid w-100" src="{{ asset($item->image) }}">
                                </div>
                                @elseif ($index == 2)
                                <div class="col-6 text-start">
                                    <img class="img-fluid" src="{{ asset($item->image) }}" style="width: 85%; margin-top: 15%;">
                                </div>
                                @elseif ($index == 3)
                                <div class="col-6 text-end">
                                    <img class="img-fluid" src="{{ asset($item->image) }}" style="width: 85%;">
                                </div>
                                @else
                                <div class="col-6 text-end">
                                    <img class="img-fluid w-100" src="{{ asset($item->image) }}">
                                </div>
                                @endif
                       
                        
                            
           
                                @endforeach

                      
                                
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <h1 class="mb-4">{{ @$aboutText->title }}</h1>
                            <p class="mb-4">{!! @$aboutText->description !!}</p>
                         
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
@endsection

    

