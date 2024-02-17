        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
   
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">

                                @foreach ($jobs as $item)
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src=" {{ asset($item->user->image) }}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start m-3">
                                            <h5 class="mb-3">{{ $item->name }} <span class="text-truncate me-3 text-primary"><i class="text-primary me-2"></i>{{ $item->user->name }}</span></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->address }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $item->office_from }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $item->office_time }}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $item->salary }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                           
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                       
                                    </div>
                                </div>
                                @endforeach
     

                            </div>
              
                            <a class="btn btn-primary py-3 px-5" href="{{ route('job.page') }}">Browse More Jobs</a>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->