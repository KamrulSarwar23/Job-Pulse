@extends('admin.layouts.master')

@section('content')
    

    <section class="section">
      <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Components</a></div>
          <div class="breadcrumb-item">Table</div>
        </div>
      </div>

      <div class="section-body">
       
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Slider</h4>
              </div>

              <div class="card-body">
              
                <form action="{{route('admin.slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Preview</label>
                    <br>
                    <img width="200px" src="{{asset($slider->banner)}}" alt="">
                  </div>

                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" class="form-control" name="banner">
                      </div>


                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                      </div>


                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{$slider->description}}">
                      </div>


                      <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option {{$slider->status == 1 ? 'selected' :''}} value="1">Active</option>
                          <option {{$slider->status == 0 ? 'selected' :''}} value="0">Inactive</option>
                        </select>
                      </div>

                      <button class="btn btn-primary">Update</button>
                </form>

              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection