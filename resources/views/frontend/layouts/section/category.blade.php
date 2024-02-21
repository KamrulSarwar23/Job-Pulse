       <style>
        .cat-item i{
            font-size: 30px;
        }
        .cat-item p{
            font-size: 15px;
        }
       </style>
       
       <!-- Category Start -->
        <div class="container-xxl my-5">
            <div class="container">
                <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h2>
                <div class="row g-4">

                    @foreach ($category as $item)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ route('job.category', $item->id) }}">
                            <i class="{{ $item->icon }} text-primary"></i>
                            <h5 class="mb-3">{{ limitText($item->name,20) }}</h5>
                            <p class="mb-0 text-primary">{{ $item->jobs->count() }} Vacancy</p>
                        </a>
                    </div>
                    @endforeach
             

                </div>
            </div>
        </div>
        <!-- Category End -->