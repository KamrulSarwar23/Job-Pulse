        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <form action="{{ route('search.job') }}" method="POST">
                                @csrf

                                <div class="col-md-12">
                                    <input type="text" name="keyword" class="form-control border-0 p-3"
                                        placeholder="Keyword" />
                                </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        {{-- <a type="submit" class="btn btn-dark border-0 w-100 p-3" href="">Search</a> --}}
                        <button type="submit" class="btn btn-dark border-0 w-100 p-3">Search</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Search End -->
