<x-app title="Edit Participant | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Participant</h4>

        <form method="POST" action="{{ route('participants.update', $participant) }}">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Full Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="name" value="{{ $participant->name }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Gender</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="male" name="gender" value="Male"
                                    {{ $participant->gender == 'Male' ? 'checked' : '' }} required>
                                <label for="male" class="btn btn-selection rounded-pill">Male</label>

                                <input type="radio" class="btn-check" id="female" name="gender" value="Female"
                                    {{ $participant->gender == 'Female' ? 'checked' : '' }}>
                                <label for="female" class="btn btn-selection rounded-pill">Female</label>

                                <input type="radio" class="btn-check" id="unknown" name="gender"
                                    {{ $participant->gender == 'Prefer not to say' ? 'checked' : '' }}
                                    value="Prefer not to say">
                                <label for="unknown" class="btn btn-selection rounded-pill">Prefer not to say</label>
                            </fieldset>
                        </div>
                        <div class="invalid-feedback">
                            Please select gender
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" class="form-control" name="email" value="{{ $participant->email }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Phone Number</label>
                        <div class="col">
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ $participant->phone_number }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">LINE ID</label>
                        <div class="col">
                            <input type="text" class="form-control" name="line_id"
                                value="{{ $participant->line_id }}" required>
                        </div>
                    </div>

                    <hr class="border-0">
                    <h5 class="mb-3">Address Details</h5>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Province</label>
                        <div class="col">
                            <input type="text" class="form-control" name="province"
                                value="{{ $participant->province }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">District/City</label>
                        <div class="col">
                            <input type="text" class="form-control" name="district"
                                value="{{ $participant->district }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Address</label>
                        <div class="col">
                            <textarea class="form-control" name="address" rows="2" value="{{ $participant->address }}" required>{{ $participant->address }}</textarea>
                        </div>
                    </div>

                    <hr class="border-0">
                    <h5 class="mb-3">Education Details</h5>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Grade</label>
                        <div class="col">
                            <select class="form-select" name="grade" id="grade" required>
                                <option disabled value="">Select education level</option>
                                @if ($participant->registrationDetail->competition->category == 'Junior High')
                                    <optgroup label="Junior High">
                                        <option value="Grade 7"
                                            {{ $participant->grade == 'Grade 7' ? 'selected' : '' }}>Grade 7
                                        </option>
                                        <option value="Grade 8"
                                            {{ $participant->grade == 'Grade 8' ? 'selected' : '' }}>Grade 8
                                        </option>
                                        <option value="Grade 9"
                                            {{ $participant->grade == 'Grade 9' ? 'selected' : '' }}>Grade 9
                                        </option>
                                    </optgroup>
                                @endif
                                @if ($participant->registrationDetail->competition->category == 'Senior High' ||
                                    $participant->registrationDetail->competition->category == 'Open Category')
                                    <optgroup label="Senior High">
                                        <option value="Grade 10"
                                            {{ $participant->grade == 'Grade 10' ? 'selected' : '' }}>Grade 10
                                        </option>
                                        <option value="Grade 11"
                                            {{ $participant->grade == 'Grade 11' ? 'selected' : '' }}>Grade 11
                                        </option>
                                        <option value="Grade 12"
                                            {{ $participant->grade == 'Grade 12' ? 'selected' : '' }}>Grade 12
                                        </option>
                                        <option value="Gap Year"
                                            {{ $participant->grade == 'Gap Year' ? 'selected' : '' }}>Gap Year
                                        </option>
                                    </optgroup>
                                @endif
                                @if ($participant->registrationDetail->competition->category == 'University' ||
                                    $participant->registrationDetail->competition->category == 'Open Category')
                                    <optgroup label="University">
                                        <option value="Year 1"
                                            {{ $participant->grade == 'Year 1' ? 'selected' : '' }}>
                                            Year 1
                                        </option>
                                        <option value="Year 2"
                                            {{ $participant->grade == 'Year 2' ? 'selected' : '' }}>
                                            Year 2
                                        </option>
                                        <option value="Year 3"
                                            {{ $participant->grade == 'Year 3' ? 'selected' : '' }}>
                                            Year 3
                                        </option>
                                        <option value="Year 4"
                                            {{ $participant->grade == 'Year 4' ? 'selected' : '' }}>
                                            Year 4
                                        </option>
                                    </optgroup>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div id="binusian" class="row mb-3 d-none">
                        <label class="col-3 col-form-label">Student of BINUS University</label>
                        <fieldset class="col">
                            <input type="radio" class="btn-check" id="yes" name="binusian" value="1"
                                {{ $participant->binusian ? 'checked' : '' }} disabled required>
                            <label for="yes" class="btn btn-selection rounded-pill">Yes</label>

                            <input type="radio" class="btn-check" id="no" name="binusian" value="0"
                                {{ !$participant->binusian ? 'checked' : '' }} disabled>
                            <label for="no" class="btn btn-selection rounded-pill">No</label>
                        </fieldset>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Institution</label>
                        <div class="col">
                            <input type="text" class="form-control" id="institution" name="institution"
                                value="{{ $participant->institution }}" required>
                        </div>
                    </div>

                    <div id="binusianDetails" class="d-none">
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">NIM</label>
                            <div class="col">
                                <input type="text" class="form-control" name="nim"
                                    value="{{ $participant->binusian ? $participant->binusian->nim : '' }}" disabled
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Campus Region</label>
                            <div class="col">
                                <select class="form-select" name="region" disabled required>
                                    <option disabled value="">Select campus region</option>
                                    <option
                                        {{ $participant->binusian && $participant->binusian->region == 'Kemanggisan' ? 'selected' : '' }}
                                        value="Kemanggisan">Kemanggisan</option>
                                    <option value="Alam Sutera"
                                        {{ $participant->binusian && $participant->binusian->region == 'Alam Sutera' ? 'selected' : '' }}>
                                        Alam Sutera</option>
                                    <option value="Bekasi"
                                        {{ $participant->binusian && $participant->binusian->region == 'Bekasi' ? 'selected' : '' }}>
                                        Bekasi</option>
                                    <option value="Senayan"
                                        {{ $participant->binusian && $participant->binusian->region == 'Senayan' ? 'selected' : '' }}>
                                        Senayan</option>
                                    <option value="Bandung"
                                        {{ $participant->binusian && $participant->binusian->region == 'Bandung' ? 'selected' : '' }}>
                                        Bandung</option>
                                    <option value="Malang"
                                        {{ $participant->binusian && $participant->binusian->region == 'Malang' ? 'selected' : '' }}>
                                        Malang</option>
                                    <option value="Semarang"
                                        {{ $participant->binusian && $participant->binusian->region == 'Semarang' ? 'selected' : '' }}>
                                        Semarang</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('participants.index') }}" type="button"
                    class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        var binusian = $('#binusian')
        var institution = $('#institution')
        var binusianDetails = $('#binusianDetails')

        if ($('#grade').find(':selected').val().indexOf('Year ') >= 0) {
            binusian.removeClass('d-none')
            binusian.find('input').prop('disabled', false)
        } else {
            binusian.find('input').prop('disabled', true).prop('checked', false)
            binusian.addClass('d-none')

            binusianDetails.addClass('d-none')
            binusianDetails.find('input').prop('disabled', true).val('')
            binusianDetails.find('select').prop('disabled', true).prop('selectedIndex', 0)
        }

        if ($('#binusian').find('input:checked').val() == true) {
            binusianDetails.removeClass('d-none')
            binusianDetails.find('input').prop('disabled', false)
            binusianDetails.find('select').prop('disabled', false)
            institution.val('BINUS University').prop('readonly', true)
        } else {
            binusianDetails.addClass('d-none')
            binusianDetails.find('input').prop('disabled', true).val('')
            binusianDetails.find('select').prop('disabled', true).prop('selectedIndex', 0)
            institution.prop('readonly', false)
        }

        $('#grade').on('change', function() {
            if ($(this).find(':selected').val().indexOf('Year ') >= 0) {
                binusian.removeClass('d-none')
                binusian.find('input').prop('disabled', false)
            } else {
                binusian.find('input').prop('disabled', true).prop('checked', false)
                binusian.addClass('d-none')

                binusianDetails.addClass('d-none')
                binusianDetails.find('input').prop('disabled', true).val('')
                binusianDetails.find('select').prop('disabled', true).prop('selectedIndex', 0)
                institution.val('').prop('readonly', false)
            }
        })

        $('#binusian').find('input').on('click', function() {
            if ($(this).val() == true) {
                binusianDetails.removeClass('d-none')
                binusianDetails.find('input').prop('disabled', false)
                binusianDetails.find('select').prop('disabled', false)
                institution.val('BINUS University').prop('readonly', true)
            } else {
                binusianDetails.addClass('d-none')
                binusianDetails.find('input').prop('disabled', true).val('')
                binusianDetails.find('select').prop('disabled', true).prop('selectedIndex', 0)
                institution.val('').prop('readonly', false)
            }
        })
    </script>
</x-app>
