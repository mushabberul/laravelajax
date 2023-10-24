<!-- Modal -->
<div class="modal fade" id="saveDataModal" tabindex="-1" aria-labelledby="saveDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="saveDataModalLabel"></h1>
            </div>
            <div class="modal-body">
                <form id="formData">
                    @csrf
                    <input type="hidden" name="update_id">
                    <div class="row">

                        <x-text-input col='col-md-6' name='name' labelName='Name' type='text'
                            placeholder='Mr.Jone Deo' />
                        <x-text-input col='col-md-6' name='email' labelName='Email' type='email'
                            placeholder='demo@gmail.com' />
                        <x-text-input col='col-md-6' name='mobile_no' labelName='Mobile Number' type='text'
                            placeholder='Ex: 01765561008' />
                        <x-text-input col='col-md-6' name='postal_code' labelName='Enter you post code' type='number'
                            placeholder='Ex:7610' />
                            <x-select-input col='col-md-6' name='role_id' labelName='Role'>
                                @if (!$data['roles']->isEmpty())
                                    @foreach ($data['roles'] as $role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                    @endforeach
                                @endif
                            </x-select-input>

                            <x-select-input col='col-md-6' name='district_id' labelName='District' onchange="selectedDistrict($(this).val())">
                                @if (!$data['location']->isEmpty())
                                    @foreach ($data['location'] as $district)
                                        <option value="{{$district->id}}">{{$district->location_name}}</option>
                                    @endforeach
                                @endif
                            </x-select-input>
                            <x-select-input col='col-md-6' name='upazila_id' labelName='Upozila' />
                        <x-text-input col='col-md-6' name='password' labelName='Password' type='password'
                            placeholder='Ex: Enter confirm password' />
                        <x-text-input col='col-md-6' name='password_confirm' labelName='Confirm Password' type='password'
                            placeholder='Ex: Enter password' />
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input type="file" class="dropify" name="image"/>
                            </div>
                        <x-textarea-input col='col-md-12' name='address' labelName='Address' />

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary saveButton"></button>
            </div>
        </div>
    </div>
</div>
