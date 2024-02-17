
    <style>
        .cat-item i{
            font-size: 40px;
        }
        .cat-item p{
            font-size: 30px;
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
    
    <!-- Category Start -->
        <div class="container-xxl pt-5">
            <div class="container">
                <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Top Companis</h2>
                <div class="row g-4">

                    @foreach ($company as $item)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ route('job.company',$item->id) }}">
                            <i class="fas fa-building mb-3"></i>
                            <p class="mb-3">{{ limitText($item->name, 20) }}</p>
                        </a>
                    </div>
                    @endforeach
        
                    
                </div>
               <div class="text-center mt-3">
                <a class="btn btn-primary py-3 px-5" href="{{ route('all.company') }}">Browse More Cpmpany</a>
               </div>
            </div>
        </div>
        <!-- Category End -->