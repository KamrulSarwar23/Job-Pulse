@extends('company.layouts.master')

@section('title')
    || Job
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Create Job</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('company.jobs.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group wsus_input">
                                        <label>Post Name</label>
                                        <input type="text" class="form-control"name="name" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address') }}">
                                    </div>


                                    <div class="form-group wsus_input">
                                        <label>Salary</label>
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ old('salary') }}">
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label for="inputState">Category</label>
                                        <select id="inputState" class="form-control" name="category">
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                          
                                        </select>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label for="inputState">Office Time</label>
                                        <select id="inputState" class="form-control" name="office_time">
                                            <option value="fulltime">Full Time</option>
                                            <option value="partime">Part Time</option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label for="inputState">Office From</label>
                                        <select id="inputState" class="form-control" name="office_from">
                                            <option value="office">Office</option>
                                            <option value="remote">Remote</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-primary">Create Job</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
