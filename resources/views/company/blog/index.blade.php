@extends('company.layouts.master')

@section('title')
    || Blog Post
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>All Blog</h3>
                        <div class="create-button">
                            <a href="{{ route('company.blog.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                                Create Blog</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <form action="{{ route('company.blog-delete') }}" method="POST">
                                @csrf
                                <button type="submit" class="ml-4 btn btn-danger mb-2">Delete Selected Item</button>
                                <div class="wsus__dash_pro_area">

                                    {{ $dataTable->table() }}

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {

                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('company.blog.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
