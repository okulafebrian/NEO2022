<x-app title="Edit Participant | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Participant</h4>

        <form method="POST" action="{{ route('participants.update', $participant) }}" enctype="multipart/form-data">
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
                            <select class="form-select" required id="province" name="province">
                                <option disabled value="">Select province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ $participant->province->id == $province->id ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">District/City</label>
                        <div class="col">
                            <select class="form-select" required name="district" id="district">
                                <option selected disabled value="">Please select province first</option>
                            </select>
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
                                <select class="form-select" name="region" id="region" disabled required>
                                    <option disabled value="">Select campus region</option>
                                    <option value="KMG"
                                        {{ $participant->binusian && $participant->binusian->region == 'KMG' ? 'selected' : '' }}>
                                        Kemanggisan
                                    </option>
                                    <option value="AS"
                                        {{ $participant->binusian && $participant->binusian->region == 'AS' ? 'selected' : '' }}>
                                        Alam Sutera
                                    </option>
                                    <option value="BKS"
                                        {{ $participant->binusian && $participant->binusian->region == 'BKS' ? 'selected' : '' }}>
                                        Bekasi
                                    </option>
                                    <option value="SNY"
                                        {{ $participant->binusian && $participant->binusian->region == 'SNY' ? 'selected' : '' }}>
                                        Senayan
                                    </option>
                                    <option value="BDG"
                                        {{ $participant->binusian && $participant->binusian->region == 'BDG' ? 'selected' : '' }}>
                                        Bandung
                                    </option>
                                    <option value="MLG"
                                        {{ $participant->binusian && $participant->binusian->region == 'MLG' ? 'selected' : '' }}>
                                        Malang
                                    </option>
                                    <option value="BOL"
                                        {{ $participant->binusian && $participant->binusian->region == 'BOL' ? 'selected' : '' }}>
                                        BINUS
                                        Online Learning
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Faculty</label>
                            <div class="col">
                                <select class="form-select" disabled required name="faculty" id="faculty">
                                    <option disabled selected value="">Please select campus region first
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Major</label>
                            <div class="col">
                                <select class="form-select" disabled required name="major" id="major">
                                    <option disabled selected value="">Please select faculty first</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h5 class="mb-3">Additional Information</h5>
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Vaccination</label>
                        <div class="col">
                            <input class="form-control" type="file" name="vaccination">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Allergy</label>
                        <div class="col">
                            <input type="text" class="form-control" name="allergy"
                                value="{{ $participant->allergy }}" required>
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
        var $district = $('#district')
        var $faculty = $('#faculty')
        var $major = $('#major')

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
                $faculty.html('<option disabled selected value="">Please select campus region first</option>');
                $major.html('<option disabled selected value="">Please select faculty first</option>');
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
                $faculty.html('<option disabled selected value="">Please select campus region first</option>');
                $major.html('<option disabled selected value="">Please select faculty first</option>');
            }
        })

        // Show District
        $.ajax({
            url: "{{ route('districts.show') }}",
            data: {
                province_id: $('#province').val()
            },
            success: function(data) {
                $district.html('<option value="" selected disabled>Select district/city</option>');
                $.each(data, function(id, value) {
                    if ({!! $participant->district->id !!} == id) {
                        $district.append('<option value="' + id + '" selected>' + value +
                            '</option>');
                    } else {
                        $district.append('<option value="' + id + '">' + value + '</option>');
                    }
                });
            }
        });

        $('#province').change(function() {
            $.ajax({
                url: "{{ route('districts.show') }}",
                data: {
                    province_id: $(this).val()
                },
                success: function(data) {
                    $district.html('<option value="" disabled selected>Select district/city</option>');
                    $.each(data, function(id, value) {
                        $district.append('<option value="' + id + '">' + value + '</option>');
                    });
                }
            });
        });

        $('#region').change(function() {
            $.ajax({
                url: "{{ route('faculties.show') }}",
                data: {
                    region: $(this).val()
                },
                success: function(data) {
                    $faculty.html('<option value="" disabled selected>Select faculty</option>');
                    $.each(data, function(id, value) {
                        $faculty.append('<option value="' + id + '">' + value + '</option>');
                    });
                }
            });

            $major.html('<option disabled selected value="">Please select faculty first</option>');
        });

        $('#faculty').change(function() {
            $.ajax({
                url: "{{ route('majors.show') }}",
                data: {
                    faculty_id: $(this).val()
                },
                success: function(data) {
                    $major.html('<option value="" disabled selected>Select major</option>');
                    $.each(data, function(id, value) {
                        $major.append('<option value="' + id + '">' + value + '</option>');
                    });
                }
            });
        });
    </script>

    @if ($participant->binusian)
        <script>
            // Show Faculty
            $.ajax({
                url: "{{ route('faculties.show') }}",
                data: {
                    region: $('#region').val()
                },
                success: function(data) {
                    $faculty.html('<option value="" disabled>Select faculty</option>');
                    $.each(data, function(id, value) {
                        if ({!! $participant->binusian->faculty->id !!} == id) {
                            $faculty.append('<option value="' + id + '" selected>' + value +
                                '</option>');
                        } else {
                            $faculty.append('<option value="' + id + '">' + value +
                                '</option>');
                        }
                    });
                }
            });

            // Show Major
            $.ajax({
                url: "{{ route('majors.show') }}",
                data: {
                    faculty_id: {!! $participant->binusian->faculty->id !!}
                },
                success: function(data) {
                    $major.html('<option value="" disabled>Select major</option>');
                    $.each(data, function(id, value) {
                        $major.append('<option value="' + id + '">' + value + '</option>');
                    });
                }
            });
        </script>
    @endif
</x-app>
