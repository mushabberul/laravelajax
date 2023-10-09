@extends('layouts.master')

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
                            <button class="btn btn-sm btn-primary float-right" onclick="showModal('Add New User','Save')">Add New</button>
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
    function showModal(modalTitle,saveButton){
        $('#saveDataModal').modal('show');

        $('#saveDataModal #saveDataModalLabel').text(modalTitle);
        $('#saveDataModal .saveButton').text(saveButton);
    }

    function selectedDistrict(district_id){
        if(district_id){
            $.ajax({
                url: "{{route('upzila.list')}}",
                method: "POST",
                dataType: "JSON",
                data: {district_id: district_id,_token: _token},
                success: function(success){
                    $('select[name=upozila_id]').html(success);
                },
                error: function(error){
                    // console.log(error);
                }
            });
        }
    }


</script>
@endpush
