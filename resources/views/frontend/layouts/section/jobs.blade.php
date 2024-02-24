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
                                            
                                            <h5 class="mb-2">{{ $item->name }} <span class="text-truncate me-3 text-primary"><i class="text-primary me-2"></i>{{ $item->user->name }}</span></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->address }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $item->office_from }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $item->office_time }}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $item->salary }}</span>
                                            <p class="mt-2"><span class="text-primary">Requirement: </span>{{ $item->requirement }}</p>
                                            <span class="text-truncate me-3 mb-2"><i class="far fa-clock text-primary me-2"></i><span class="text-info">Publish: {{ $item->created_at->diffForHumans() }}</span></span>
                                            <span class="text-truncate me-3 mb-2"><i class="far fa-clock text-primary me-2"></i><span class="text-info">Last Date: {{ \Carbon\Carbon::parse($item->end_date)->format('d F Y') }}</span></span>
                                        </div>
                                    </div>
                                  
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                           <form action="{{ route('candidate.job.apply') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{ $item->id }}">

                                            <input type="hidden" name="company_id" value="{{ $item->user->id }}">
                                           @auth
                                           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                           @endauth

                                           <button class="applied btn btn-primary">Apply Now</button>
                                           
                                           </form>
                                           
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


@push('scripts')
  
  
@endpush