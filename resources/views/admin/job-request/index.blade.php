@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Job Request</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Job Post Request</h4>
                        </div>

                        <form action="{{ route('admin.job-delete') }}" method="POST">
                            @csrf
                            <button type="submit" class="ml-4 btn btn-danger">Delete Selected Item</button>

                            <div class="card-body">

                                {{ $dataTable->table() }}

                            </div>
                        </form>

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

                var table = $('#jobs_table').DataTable({
                    "createdRow": function(row, data, dataIndex) {
                        $(row).attr('id', 'employee_ids' + data.id);
                    }
                });

                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.job-request.change-status') }}",
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
