@extends('layouts.master')

@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                User List
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-sm btn-primary float-right"
                                    onclick="showModal('Add New User','Save')">Add New</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Upazila</th>
                                <th>Postal Code</th>
                                <th>Verified Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.modal-xl')
@endsection
@push('script')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop',
                'replace': ' replace',
                'remove': 'Remove',
                'error': 'Ooops'
            }
        });

        function showModal(modalTitle, saveButton) {
            let formReset = $('#formData')[0].reset();


            $('#formData .alert').remove();
            $('#saveDataModal').modal('show');

            $('#saveDataModal #saveDataModalLabel').text(modalTitle);
            $('#saveDataModal .saveButton').text(saveButton);
        }

        function selectedDistrict(district_id) {
            if (district_id) {
                $.ajax({
                    url: "{{ route('upzila.list') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        district_id: district_id,
                        _token: _token
                    },
                    success: function(res) {
                        $('select[name=upazila_id]').html(res);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        }

        $('.saveButton').on('click', function() {


            let formData = document.getElementById('formData');

            let formDataObj = new FormData(formData);

            $.ajax({
                url: "{{ route('user.store') }}",
                method: "POST",
                dataType: "JSON",
                data: formDataObj,
                processData: false,
                cache: false,
                contentType: false,
                success: function(success) {
                    if (false == success.status) {
                        $('#formData .alert').remove();
                        $.each(success.errors, function(key, value) {
                            $('#formData #' + key).parent().append(
                                '<div class="alert alert-warning">' + value + '</div>');
                        });
                    } else {

                        $('#saveDataModal').modal('hide');
                    }
                },
                error: function(error) {
                    console.log('error');
                    console.log(error);
                }
            });
        });
    </script>
@endpush
