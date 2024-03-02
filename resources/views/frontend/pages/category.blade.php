@extends('frontend.layouts.master')


<style>
    .cat-item i{
        font-size: 30px;
    }
    .cat-item p{
        font-size: 18px;
        color: black;
        font-weight: bold;
    }
    .cat-item h6{
        font-size: 25px;
    }
    .fa-building{
        color: #00b074;
    }
</style>

@section('content')
     <!-- Header End -->
     <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">All Category</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Category</a></li>
                </ol>
            </nav>
        </div>
    </div>

          <!-- Category Start -->
          <div class="container-xxl my-5">
            <div class="container">
                <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h2>
                <div class="row g-4 mt-3">
 
                    <div class="row equal-height">
                        @foreach ($category as $item)
                            <div class="col-lg-3 col-sm-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
                                <a class="cat-item rounded p-4 d-flex flex-column justify-content-between"
                                    href="{{ route('job.category', $item->id) }}">
                                    <i class="{{ $item->icon }} text-primary"></i>
                                    <div>
                                        <h5 class="mb-3 mt-3">{{ limitText($item->name, 20) }}</h5>
                                        <p class="mb-0 text-primary"><span class="text-primary">({{ $item->jobs->count() }})</span></p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- Category End -->
@endsection
     
     
