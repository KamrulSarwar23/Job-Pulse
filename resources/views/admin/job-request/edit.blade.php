@extends('admin.layouts.master')

@section('title')
    Job Post Request Edit
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Job Request</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Job Request</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.company.job-request-update', $jobs->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group wsus_input">
                                    <label>Post Name</label>
                                    <input type="text" class="form-control"name="name" value="{{ $jobs->name }}">
                                </div>

                                <div class="form-group wsus_input">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $jobs->address }}">
                                </div>


                                <div class="form-group wsus_input">
                                    <label>Salary</label>
                                    <input type="text" class="form-control" name="salary"
                                        value="{{ $jobs->salary }}">
                                </div>

                                <div class="form-group wsus_input">
                                    <label>Application Last Date</label>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ $jobs->end_date }}">
                                </div>

                                
                                <div class="form-group wsus_input">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control" name="category">

                                        @foreach ($category as $item)
                                            <option {{ $jobs->category_id == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group wsus_input">
                                    <label for="inputState">Office Time</label>
                                    <select id="inputState" class="form-control" name="office_time">
                                        <option {{ $jobs->office_time == 'fulltime' ? 'selected' : ''}} value="fulltime">Full Time</option>
                                        <option {{ $jobs->office_time == 'partime' ? 'selected' : ''}} value="partime">Part Time</option>
                                    </select>
                                </div>

                                <div class="form-group wsus_input">
                                    <label for="inputState">Office From</label>
                                    <select id="inputState" class="form-control" name="office_from">
                                        <option {{ $jobs->office_from == 'office' ? 'selected' : ''}} value="office">Office</option>
                                        <option {{ $jobs->office_from == 'remote' ? 'selected' : ''}} value="remote">Remote</option>
                                    </select>
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Vacancy</label>
                                    <input type="number" class="form-control" name="vacancy"
                                        value="{{ $jobs->vacancy }}">
                                </div>


                               <div class="form-group wsus_input">
                                        <label>Requirement</label>
                                        <textarea class="form-control summernote" name="description" id="" cols="30" rows="10" placeholder="Write Details About Job">{{ $jobs->description }}</textarea>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Responsibility</label>
                                        <textarea class="form-control summernote" name="responsibility" id="" cols="30" rows="10" placeholder="Employee Responsibility">{{ $jobs->responsibility }}</textarea>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Qualifications</label>
                                        <textarea class="form-control summernote" name="qualifications" id="" cols="30" rows="10" placeholder="Employee Qualifications">{{ $jobs->qualifications }}</textarea>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Benifits</label>
                                        <textarea class="form-control summernote" name="benefits" id="" cols="30" rows="10" placeholder="Write What Kind Of Benifits Will get a Employee">{{ $jobs->benefits }}</textarea>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Business</label>
                                        <textarea class="form-control summernote" name="business" id="" cols="30" rows="10" placeholder="Write About Your Business">{{ $jobs->business }}</textarea>
                                    </div>

                                <div class="form-group wsus_input">
                                    <label for="inputState">Office From</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $jobs->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                                        <option {{ $jobs->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary">Update Job</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
