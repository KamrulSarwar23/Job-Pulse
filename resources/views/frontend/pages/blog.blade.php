@extends('frontend.layouts.master')

<style>
.card img{
    height: 250px;
    cursor: pointer;
}
</style>

@section('content')
     <!-- Header End -->
     <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Blog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Blog</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->

         <!-- Category Start -->
         <div class="container">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Our Blog</h1>
                <div class="row g-4">
                    @foreach ($blog as $item)
                    <div class="card m-3" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <details>
                                <summary> <h5 class="card-title">{{ $item->title }}</h5></summary>
                                <p class="card-text">{!! $item->description !!}.</p>
                            </details>
                         
                                               
                        </div>
                      </div>

                    @endforeach
                </div>
            </div>
        </div>
        <!-- Category End -->
@endsection
     
     
