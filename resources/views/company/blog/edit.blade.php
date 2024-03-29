@extends('company.layouts.master')

@section('title')
    || Blog
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Update Blog</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('company.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                    
                                        <img width="200px" height="150px" src="{{ asset($blog->image) }}" alt="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control"name="title" value="{{ $blog->title }}">
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label>Description</label>
                                        <textarea name="description" id="" class="form-control summernote">{{ $blog->description }}</textarea>
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control" name="status">
                                            <option {{ $blog->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $blog->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        </select>
                                    </div>
    
                                    <button class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
